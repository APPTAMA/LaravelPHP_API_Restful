<?php 

namespace App\Http\Controllers;

/**
* 
*/
class WelcomeController extends Controller
{
	
	function __construct()
	{
		$this->middleware('guest');
	}


	function index()
	{
		return view('welcome');
	}

}
