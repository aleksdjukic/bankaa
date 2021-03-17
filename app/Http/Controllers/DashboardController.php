<?php

namespace App\Http\Controllers;

use App\Models\LogIstorija;
use App\Models\NewsLetter;
use App\Models\UserActivity;
use App\Traits\GalleryTrait;
use App\Traits\ImageTrait;
use App\Traits\SlugTrait;
use App\Traits\TextTrait;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class DashboardController extends Controller
{

    use GalleryTrait;
    use ImageTrait;
    use TextTrait;
    use SlugTrait;

    public function index()
    {

        $userActivities = UserActivity::orderby('created_at', 'desc')->get();

        $admins = LogIstorija::orderby('created_at', 'desc')->get();

        return view('admin.dashboard')->withAdmins($admins)->withUserActivities($userActivities);
    }

    public function ckeditor(Request $request){

        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/images/'.$fileName);
            $msg = "image upload successfully";
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }

    }

    public function newsletter()
    {
        $newsletters = NewsLetter::orderBy('created_at', 'desc')->paginate(10);

        $br = ($newsletters->currentPage() - 1) * $newsletters->perPage() + 1;
        return view('admin.newsletters.index')->withNewsletters($newsletters)->withBr($br);
    }

}
