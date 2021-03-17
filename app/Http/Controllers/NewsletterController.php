<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsletters\CreateNewsletterRequest;
use App\Models\NewsLetter;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
{
    public function store(CreateNewsletterRequest $request)
    {
        $email = $request->email;

        $newsletter = new NewsLetter;
        $newsletter->email = $email;

        if ($newsletter->save()) {
            Session::flash('success', 'Uspješno ste se preplatili');
        } else {
            Session::flash('error', 'Whoops, something went wrong');
        }
        return redirect()->route('home', app()->getLocale());
    }

    public function search(Request $r)
    {
        if ($r->ajax()) {
            $newsletters = NewsLetter::sort()->search()->paginate($this->pag);
            $br = ($newsletters->currentPage() - 1) * $newsletters->perPage() + 1;
            return view('include.newsletters._ajax_admin_newsletters')->withNewsletters($newsletters)->withBr($br);
        }
    }

    public function destroy(NewsLetter $newsLetter)
    {
        if ($newsLetter->delete()) {
            Session::flash('success', 'Uspješno ste obrisali pretplatnika');
            $user_activity = UserActivity::create(['log_id' => Session::get('user_log_id'), 'users_activity' => 'Brisanje pretplatnika: "' . $newsLetter->email . '"']);
            $user_activity->save();
        } else {
            Session::flash('error', 'Ne može se obrisati');
        }
        return redirect()->back();
    }

}
