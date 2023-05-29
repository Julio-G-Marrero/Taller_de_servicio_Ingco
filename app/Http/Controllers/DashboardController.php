<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        if(auth()->user()->role_id == 1){
            return redirect('/');
        }
        return view('user.principalGerente');
    }
    public function centroDeServicio()
    {
        if(auth()->user()->role_id != 4){
            return redirect('/');
        }
        return view('user.centroServicio');
    }
}
