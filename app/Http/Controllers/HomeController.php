<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('pages-rtl.dashboard', ['title' => __('trans.bhoothat')]);
    }

    public function showRequests(){
        return view('pages-rtl.requests', ['title' => __('trans.bhoothat')]);
    }

    public function clear()
    {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return 'cleared';
    }

    public function requestResearch()
    {
        return view('pages-rtl.request-research', ['title' => __('trans.bhoothat')]);

    }
}
