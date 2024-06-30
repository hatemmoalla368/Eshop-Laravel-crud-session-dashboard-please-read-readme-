<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show($date, $num){
      return view("show", compact("date","num"));
    }
    public function form(){
        return view("form");
    }
    public function post(request $request){
      $date=$request->date;
      $num=$request->num;
      return view("show", compact("date", "num"));
    }
}
