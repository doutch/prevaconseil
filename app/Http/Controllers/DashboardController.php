<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\AnnonceRepository;
use App\Repositories\ProfilRepository;
use App\Repositories\ActualiteRepository;

use Illuminate\Http\Request;


class DashboardController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,UserRepository $user_gestion,
                            AnnonceRepository $annonce_gestion,ProfilRepository $profil_gestion,
                            ActualiteRepository $actualite_gestion)
    {
        //si c'est un administrateur
        if (session('statut') === 'admin'){

        	//récupération du nombre d'utlisateurs
    		$nbrUsers = $user_gestion->getNumber('user');

    		//récupération du nombre de posts
    		$nbrePosts = $annonce_gestion->getNumber(null);

            $nBreActualites = $actualite_gestion->getNumber(null);

            return view('dashboard.accueil',['nbrUsers'=> $nbrUsers,'nbrePosts'=> $nbrePosts,'nBreActualites'=> $nBreActualites]);

        }

        //sinon c'est un utilisateur
        else{

            //récupération du nombre de posts de l'utilisateur
            $nbrePosts = $annonce_gestion->getNumber($request->user()->id);

            //teste si le profil a été créé
            if(!$profil_gestion->ifProfilExist($request->user()->id))
                $profil = 'OK';
            else
                $profil = 'NOK';

            return view('dashboard.accueil',compact('nbrePosts','profil'));
        }
    }


    public function filemanager(){

        $url = 'filemanager/index.html?langCode=fr';

        return view('dashboard.filemanager', compact('url'));
    }

}