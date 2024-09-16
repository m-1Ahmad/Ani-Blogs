<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Homepage';
        return view('pages.index')->with('title',$title);
    }
    public function about(){
        $title = 'Muhammad Ahmad';
        return view('pages.about')->with('title',$title);
    }
    public function services(){
        $data = array(
            'title' => 'Services we provides',
            'services' => ['Blog Management','User Authentication','Admin Dashboard']
        );
        return view('pages.services')->with($data);
    }
}
