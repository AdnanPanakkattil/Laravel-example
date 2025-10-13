<?php

namespace App\Http\Controllers;

abstract class Controller
{
   public function homePage()
    {
        return view('welcome');
    }
    public function aboutUs()
     {
        return view('about-us');
     }
    public function Table()
     {
        return view('Table');
     }

   public function formTable()
    {
        return view('Register');
    }
   public function Login()
    {
        return view('Login');
    }
}
