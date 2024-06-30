<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->role=="admin" or Auth::user()->role=="super admin"){
        return redirect()->route('categories.index');
    } elseif (session()->has("panier")) {
        return redirect()->route('exercice.checkout')/*->withErrors(['msg' => 'account created !!! checkout now below'])*/;
    } elseif (Auth::user()->role!=="admin" or Auth::user()->role!=="super admin"){
        return redirect('/');

    } else {
          session()->flush();
        return redirect('/');
    }
    }
}

