<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('layout.site.home');
    }

    public function marcacao(){
        return "EM CONSTRUÇÂO";
    }
}
