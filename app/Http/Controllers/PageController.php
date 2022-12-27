<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function events(){
        return view('pages.index');
    }

    public function donate(){
        return view('pages.index');
    }

    public function why_donate(){
        return view('pages.why-donate');
    }

    public function about(){
        return view('pages.index');
    }

    public function donate_form(){
        return view('pages.form');
    }
}
