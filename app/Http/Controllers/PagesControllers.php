<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControllers extends Controller
{
    public function index(){
        return view('index');
    }
    public function login(){
        return view('login1');
    }
    public function register(){
        return view('register1');
    }
}
