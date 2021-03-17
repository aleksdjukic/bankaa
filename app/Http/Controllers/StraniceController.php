<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\UserActivity;
use App\Traits\DocumentTrait;
use App\Traits\SlugTrait;
use App\Traits\TextTrait;
use App\Traits\ImageTrait;
use App\Traits\GalleryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use jazmy\FormBuilder\Events\Form\FormCreated;
use jazmy\FormBuilder\Events\Form\FormDeleted;
use jazmy\FormBuilder\Events\Form\FormUpdated;
use jazmy\FormBuilder\Helper;
use jazmy\FormBuilder\Models\Form;
use jazmy\FormBuilder\Requests\SaveFormRequest;
use Mews\Purifier\Facades\Purifier;
use App\Models\Template;

class StraniceController extends Controller
{
    use DocumentTrait;
    use GalleryTrait;
    use ImageTrait;
    use TextTrait;
    use SlugTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Forms";

        $forms = Form::getForUser(auth()->user());

        return view('admin.stranice.index', compact('pageTitle', 'forms'));
//        return view('admin.stranice.index')->withPages($pages)->withBr($br)->withLang($lang);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Create New Form";

        $saveURL = route('formbuilder::forms.store');

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = Helper::getConfiguredRoles();

        return view('admin.stranice.create', compact('pageTitle', 'saveURL', 'form_roles'));

//        return view('admin.stranice.create')->withLayoutId($layoutId)->withTemplate($template);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveFormRequest $request)
    {

        $user = $request->user();

        $input = $request->merge(['user_id' => $user->id])->except('_token');

        DB::beginTransaction();

        // generate a random identifier
        $input['identifier'] = $user->id.'-'.Helper::randomString(20);
        $created = Form::create($input);

        try {
            // dispatch the event
            event(new FormCreated($created));

            DB::commit();

            return response()
                ->json([
                    'success' => true,
                    'details' => 'Form successfully created!',
                    'dest' => route('formbuilder::forms.index'),
                ]);
        } catch (Throwable $e) {
            info($e);

            DB::rollback();

            return response()->json(['success' => false, 'details' => 'Failed to create the form.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])
            ->with('user')
            ->withCount('submissions')
            ->firstOrFail();

        $pageTitle = "Preview Form";

        return view('formbuilder::forms.show', compact('pageTitle', 'form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $pageTitle = 'Edit Form';

        $saveURL = route('formbuilder::forms.update', $form);

        // get the roles to use to populate the make the 'Access' section of the form builder work
        $form_roles = Helper::getConfiguredRoles();

        return view('admin.stranice.edit', compact('form', 'pageTitle', 'saveURL', 'form_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveFormRequest $request, $id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();

        $input = $request->except('_token');

        if ($form->update($input)) {
            // dispatch the event
            event(new FormUpdated($form));

            return response()
                ->json([
                    'success' => true,
                    'details' => 'Form successfully updated!',
                    'dest' => route('formbuilder::forms.index'),
                ]);
        } else {
            response()->json(['success' => false, 'details' => 'Failed to update the form.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $form = Form::where(['user_id' => $user->id, 'id' => $id])->firstOrFail();
        $form->delete();

        // dispatch the event
        event(new FormDeleted($form));

        return back()->with('success', "'{$form->name}' deleted.");
    }
//
//    public function visibility(Request $r)
//    {
//        if($r->ajax())
//        {
//            $page = Page::findOrFail($r->id);
//            $page->visibility = ($page->visibility == 1) ? 0 : 1;
//            $page->save();
//            $sve = Page::where('id', '=', $r->id)->first();
//            return view('include.pages._ajax_akt_deak_pages')->withSve($sve)->withBr($r->br);
//        }
//    }

    public function search(Request $r)
    {
        if($r->ajax())
        {
            $pages = Page::sort()->search()->paginate($this->pag);
            $br = ($pages->currentPage() - 1) * $pages->perPage() + 1;
            return view('include.stranice._ajax_admin_stranice')->withPages($pages)->withBr($br);

        }
    }

    public function getPage($lang, $slug) {

//        $page = Page::where('slug_'.$lang, '=', $slug)->first();
//
//        return view('extends.template')->withPage($page)->withLang($lang);

        $response = Form::where('slug_'.$lang, '=', $slug)->first();


        return view('stranice.universal')->withLang($lang)->withResponse($response);
    }

    public function template()
    {
        return view('admin.stranice.template');
    }
}
