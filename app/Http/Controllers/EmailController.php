<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class EmailController extends Controller
{

	public function index(){

        return view('dashboard.email_index');
    }
}