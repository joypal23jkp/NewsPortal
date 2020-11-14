<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showallUser(){
        $all_user = User::all();
        return view('admin/all-users',['users'=>$all_user]);
    }

    public function showUser($id){
        $user = User::where('id', $id)->first();
        return view('admin/single-user',['user'=>$user]);
    }


}
