<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.landing_page');    
    }

    public function about(){
        return view('pages.about');
    }
    public function general_search_2(Request $request)
    {   

        $name = $request->name;
        $data['t_data']=$name;
        var_dump($data); die(); 
        
        return view('pages.home');
    }
}   