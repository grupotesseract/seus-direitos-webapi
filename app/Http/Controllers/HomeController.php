<?php

namespace App\Http\Controllers;

/**
 * @resource Home
 *
 * Home
 */
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
