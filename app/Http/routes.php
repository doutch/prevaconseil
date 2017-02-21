<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => 'web'], function () {

    //test
     Route::get('/test',array('uses' => 'ProfilController@test'));
     Route::get('/test_societe',array('uses' => 'ProfilController@testSociete'));


	//accueil
	Route::get('/', function () {
        return view('accueil');
    });

    //société
    Route::get('/societe/activites', array('as' => 'societe.activites',function () {
        return view('societe_activites');
    }));

    Route::get('/societe/mot_directeur',  array('as' => 'societe.mot_directeur',function () {
        return view('societe_mot_directeur');
    }));


    //formations
    //Route::get('/formations/{typeFichier}',array('uses' => 'FichierController@indexWeb', 'as' => 'formations.liste'));  
    

    Route::get('/formations/expertise',  array('as' => 'formations.expertise',function () {
        return view('formations_expertise');
    }));

    

     //services
     Route::get('/services/accompagnement',  array('as' => 'services.accompagnement',function () {
        return view('services_accompagnement');
    }));

    Route::get('/service/audit',  array('as' => 'services.audit',function () {
        return view('services_audit');
    }));

     Route::get('/services/conseil',  array('as' => 'services.conseil',function () {
        return view('services_conseil');
    }));

     Route::get('/services/formation',  array('as' => 'services.formation',function () {
        return view('services_formations');
    }));

     //secteurs d'activite
    Route::get('/secteurs-activite/ehpad',  array('as' => 'secteurs.ehpad',function () {
        return view('secteurs_ehpad');
    }));

    Route::get('/secteurs-activite/esat',  array('as' => 'secteurs.esat',function () {
        return view('secteurs_esat');
    }));

    Route::get('/secteurs-activite/ime',  array('as' => 'secteurs.ime',function () {
        return view('secteurs_ime');
    }));

    Route::get('/secteurs-activite/pme',  array('as' => 'secteurs.pme',function () {
        return view('secteurs_pme');
    }));

    //Infos pratiques
     Route::get('/infos-pratiques/reglementation',  array('as' => 'infos.reglementation',function () {
        return view('infos_reglementation');
    }));


    //liste d'annonces
    Route::get('/annonces',array('uses' => 'AnnonceController@indexWeb', 'as' => 'annonce.listeWeb'));                 //liste des annonces
    Route::get('/annonces/show/{slug}', array('uses' => 'AnnonceController@showWeb', 'as' => 'annonce.showWeb'));             //vue d'une annonce

    //Contact
	Route::get('/contact', array('as' => 'contact',function () {
        return view('contact');
      }));

    //facile )à lire et à comprendre
    Route::get('/facile-a-lire-et-a-comprendre',  array('as' => 'facile_a_lire',function () {
        return view('facile_a_lire');
    }));

    //catalogue
    Route::get('/catalogue',  array('as' => 'catalogue',function () {
        return view('catalogue');
    }));

	//routes authentification
    Route::auth();

    Route::get('/auth/success', ['as'   => 'auth.success','uses' => 'Auth\AuthController@success']);    //route après l'enregistrement



    //routes pour un utilisateur authentifié
    Route::group(['middleware' => 'auth','prefix' => 'dashboard'], function () {     

        //tableau de bord
        Route::get('/',['uses' => 'DashboardController@index', 'as' => 'dashboard']);

        //annonces
        Route::get('/annonces',array('uses' => 'AnnonceController@indexAuth', 'as' => 'annonce.liste'));                 //liste des annonces
        Route::get('/annonces/show/{slug}', array('uses' => 'AnnonceController@show', 'as' => 'annonce.show'));       //vue d'une annonce
        Route::get('/annonces/create/{typeAnnonce}', array('uses' => 'AnnonceController@create', 'as' => 'annonce.create'));     //création d'une annonce
        Route::post('/annonces/create/{typeAnnonce}', array('uses' => 'AnnonceController@store', 'as' => 'annonce.store'));     //enregistrement de l'annonce

        Route::get('/profil',array('uses' => 'ProfilController@index', 'as' => 'profil'));
        Route::get('/profil/create',array('uses' => 'ProfilController@create', 'as' => 'profil.create'));             //création du 
        Route::post('/profil',array('uses' => 'ProfilController@store', 'as' => 'profil.store'));                   //enregistrement du profil
        Route::get('/profil/edit/{id}', array('uses' => 'ProfilController@edit', 'as' => 'profil.edit'));           //edition du profil
        Route::put('/profil/update/{id}', array('uses' => 'ProfilController@update', 'as' => 'profil.update'));     //modification d'un profil 
        
        //routes pour un utilisateur
        Route::group(['middleware' => 'user'], function () { 

            //annonces
            Route::get('/annonces/edit/{slug}', array('uses' => 'AnnonceController@edit', 'as' => 'annonce.edit'));                   //edition d'une annonces
            Route::put('/annonces/update/{slug}', array('uses' => 'AnnonceController@update', 'as' => 'annonce.update'));             //modification d'une annonces
            Route::delete('/annonces/delete/{slug}', array('uses' => 'AnnonceController@destroy', 'as' => 'annonce.destroy'));        //suppression d'une annonce
            
        });


        ///routes pour un admin
        Route::group(['middleware' => 'admin'], function () { 

            //actualité
            Route::get('/actualites',array('uses' => 'ActualiteController@index', 'as' => 'actualite.liste'));               //liste des actualités
            Route::get('/actualite/create', array('uses' => 'ActualiteController@create', 'as' => 'actualite.create'));     //création d'une actualité
            Route::post('/actualite/create', array('uses' => 'ActualiteController@store', 'as' => 'actualite.store'));     //enregistrement d'une actualité
            Route::get('/actualite/show/{slug}', array('uses' => 'ActualiteController@show', 'as' => 'actualite.show'));       //vue d'une actualité
            Route::get('/actualite/edit/{slug}', array('uses' => 'ActualiteController@edit', 'as' => 'actualite.edit'));                   //edition d'une annonces
            Route::put('/actualite/update/{slug}', array('uses' => 'ActualiteController@update', 'as' => 'actualite.update'));             //modification d'une annonces
            Route::delete('/actualite/delete/{slug}', array('uses' => 'ActualiteController@destroy', 'as' => 'actualite.destroy'));        //suppression d'une annonce

            //categories
            Route::get('/categorie/{typeCategorie}',array('uses' => 'CategorieController@index', 'as' => 'categorie.liste')); //liste des categories  
            Route::get('/categorie/show/{slug}', array('uses' => 'CategorieController@show', 'as' => 'categorie.show'));       //vue d'une catégorie
            Route::get('/categorie/edit/{slug}', array('uses' => 'CategorieController@edit', 'as' => 'categorie.edit'));                   //edition d'une catégorie
            Route::put('/categorie/update/{slug}', array('uses' => 'CategorieController@update', 'as' => 'categorie.update'));             //modification d'une catégorie
            Route::get('/categorie/{typeCategorie}/create',array('uses' => 'CategorieController@create', 'as' => 'categorie.create'));  //création d'une catégorie'
            Route::post('/categorie/{typeCategorie}/create',array('uses' => 'CategorieController@store', 'as' => 'categorie.store'));  //enregistrement de la catégorie
            Route::delete('/categorie/delete/{slug}/{typeCategorie}', array('uses' => 'CategorieController@destroy', 'as' => 'categorie.destroy'));        //suppression d'une annonce


            //catalogue
            Route::get('/fichier/{typeFichier}',array('uses' => 'FichierController@index', 'as' => 'fichier.liste'));               //liste des fichiers
            Route::get('/fichier/create/{typeFichier}', array('uses' => 'FichierController@create', 'as' => 'fichier.create'));     //création d'un fichier
            Route::post('/fichier/create/{typeFichier}', array('uses' => 'FichierController@store', 'as' => 'fichier.store'));     //enregistrement d'un fichier
            Route::get('/fichier/show/{slug}', array('uses' => 'FichierController@show', 'as' => 'fichier.show'));                  //vue d'un fichier
            Route::get('/fichier/edit/{slug}', array('uses' => 'FichierController@edit', 'as' => 'fichier.edit'));                   //edition d'un fichier
            Route::put('/fichier/update/{slug}', array('uses' => 'FichierController@update', 'as' => 'fichier.update'));             //modification d'un fichier
            Route::delete('/fichier/delete/{slug}', array('uses' => 'FichierController@destroy', 'as' => 'fichier.destroy'));        //suppression d'un fichier


            //profil
           //Route::delete('/profil/delete/{id}', array('uses' => 'ProfilController@destroy', 'as' => 'profil.destroy'));    //suppression d'un profil

            //email
            Route::get('/email',array('uses' => 'EmailController@index', 'as' => 'email.index'));               //Rédaction de l'email

            //filemanager
            Route::get('/filemanager', array('uses' => 'DashboardController@filemanager','as' => 'filemanager.index'));          //interface du filemenager
        });

        //Routes ajax
        Route::group(['middleware' => 'ajax'], function () { 
        
            Route::put('annonce-active/{slug}', array('uses' => 'AnnonceController@updateActive', 'as' => 'annonce.update-active'));  //activation d'une annonce

        });

     });

});



