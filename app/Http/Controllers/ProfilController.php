<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfilController extends Controller
{
    public function index(Request $request){

    	return view('dashboard.profil',['user_name' => $request->user()->name,'user_email' => $request->user()->email]);
    }


    public function test(){

    	return view('dashboard.test');
    }


     public function testSociete(){

    	return view('dashboard.test_societe');
    }
}
