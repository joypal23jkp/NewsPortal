<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('layouts/profile');
    }

    public function comment(Request $request)
    {
        if ($request->post('comment') != null) {
                $comment = new Comments();
                $comment->user_id = \Auth::user()->id;
                $comment->news_id = $request->post('news_id');
                $comment->comment_body = $request->post('comment');
                $comment->save();
                return \Redirect::back();
        } else {
                return \Redirect::back();
        }
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id', \Auth::user()->id)->first();

        if ( $request->file('inputImage')){
            $this->validate($request,[
                'inputImage' =>'required|image|mimes:jpeg,jpg|max:1080'
            ]);
            $image = $request->file('inputImage');
            $u_name = rand().'.'.$image->getClientOriginalExtension();

            $image->move(public_path("image/user"),$u_name);
            $user->img_url = 'image/user/'.$u_name;
        }

        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->address = $request->post('address');
        $user->contact = $request->post('contact');
        $update_response = $user->save();
        return \Redirect::back();

    }
}
