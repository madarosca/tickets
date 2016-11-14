<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrioritiesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


     public function index()
    {
        
        $priorities = Priority::orderBy('id', 'desc')->get();

        return view('home', array(
            'priorities' => $priorities,
        ));
    }
}
