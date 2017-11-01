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

	public function auth(Request $request)
	{
		$username = $request->input('username') ;
		$password = $request->input('password') ;
		
		$getData = 	CorpPerRel::where('username',$username)
							  ->where('password',$password)
							  ->get();

		if(isset($getData[0]) && $getData[0]->act_flg == 'A')
		{
			return view('welcome');
		} else 
		{
			return view('auth')->with('msg','Invalid username/password.');
		}
	}
	
	public function activated(Request $request)
	{
		
		$username = $request->input('username') ;
		$oldpassword = $request->input('oldpassword') ;
		$newpassword1 = $request->input('newpassword1') ;
		$newpassword2 = $request->input('newpassword2') ;
		
		$getData = CorpPerRel::where('username',$username)
							 ->where('password',$oldpassword)
							 ->get();

		 	if(isset($getData[0]) && $getData[0]->act_flg == 'A' && $newpassword1!= null && $newpassword2!= null && $newpassword1 == $newpassword2)
		{
			return view('activate')->with('msg','This user already activated.');
		}
			if(isset($getData[0]) && $getData[0]->act_flg == 'I' && $newpassword1!= null && $newpassword2!= null && $newpassword1 == $newpassword2)
		{
				
			CorpPerRel::where('username',$username)
					  ->where('password',$oldpassword)
					  ->update([
						'act_flg' => 'A',
						'password' => $newpassword1,
						'update_by' => $username
					]);
			return view('activate')->with('msg','Activated successful');
		}
			else 
		{
			return view('activate')->with('msg','Invalid username/password.');
		}
	}
	
}
