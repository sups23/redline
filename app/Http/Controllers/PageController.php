<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function events(){
        return view('pages.events');
    }

    public function donate(){
        return view('pages.donate');
    }

    public function why_donate(){
        return view('pages.why_donate');
    }

    public function about(){
        return view('pages.about');
    }

    public function donate_form(){
        return view('pages.donate_form');
    }
}
