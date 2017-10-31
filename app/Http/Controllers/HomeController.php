<?php

namespace App\Http\Controllers;

use App\CorpPerRel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index(){
		return view('auth');
	}

	public function activate(){
		return view('activate');
	}

	public function auth(Request $request){
		$username = $request->input('username') ;
		$password = $request->input('password') ;
		
		$getData = 	CorpPerRel::where('username',$username)
							  ->where('password',$password)
							  ->get();

		if(isset($getData[0]) && $getData[0]->act_flg == 'A'){
			return view('welcome');
		} else {
			return view('auth')->with('msg','Invalid username/password');
		}
	}
}
