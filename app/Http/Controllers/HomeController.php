<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all()->where('id','!=',1);
        return view('home',compact('usuarios'));
    }

    public function createUsuario()
    {
        return 123;
    }

    public function destroyUsuario($id)
    {
        return 123;
    }

    
}
