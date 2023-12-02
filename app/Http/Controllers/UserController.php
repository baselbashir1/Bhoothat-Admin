<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(){
        $users = Subscriber::all();
        return view('pages-rtl.users', ['title' => __('trans.bhoothat')], ['users' => $users]);
    }
}
