<?php

// namespace App\Http\Controllers;

// abstract class Controller
// {
//    public function homePage()
//     {
//         return view('welcome');
//     }
//     public function aboutUs()
//      {
//         return view('about-us');
//      }
//     public function Table()
//      {
//         return view('Table');
//      }

//    public function formTable()
//     {
//         return view('Register');
//     }
//    public function Login()
//     {
//         return view('Login');
//     }
// }


namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
