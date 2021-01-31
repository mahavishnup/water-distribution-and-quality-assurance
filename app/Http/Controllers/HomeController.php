<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('dashboard');
    }

    public function handleAdmin()
    {
        return view('admin.dashboard');
    }
}
