<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $rol = Auth::User()->rol;

        if($rol == '1' || $rol == '2'){
            return redirect()->route('admin.home');
        }

        if ($rol == '0') {
            return redirect()->route('productor.home');
        }

        else{

            return view('welcome');
        }
    }
}
