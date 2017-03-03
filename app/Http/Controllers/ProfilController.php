<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfilController extends Controller
{
    public function index(Request $request){

    	if (session('statut') === 'employeur')
    		return view('dashboard.profil_employeur_create',['prenom' => $request->user()->firstname,'nom' => $request->user()->name,'email' => $request->user()->email]);

    	else if(session('statut') === 'demandeur_emploi')
    		return view('dashboard.profil_demandeur_emploi_create',['prenom' => $request->user()->firstname,'nom' => $request->user()->name,'email' => $request->user()->email]);
    }


    public function test(){

    	return view('dashboard.test');
    }


     public function testSociete(){

    	return view('dashboard.test_societe');
    }
}
