<?php

namespace App\Http\Controllers;

use DB;
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
			$userId = $getData[0]->corp_per_rel_id ;
			$event = DB::table('CORP_PER_EVENT_INFO')
							  ->leftJoin('CORP_PER_REL','CORP_PER_EVENT_INFO.corp_per_rel_id','=','CORP_PER_REL.corp_per_rel_id')
							  ->leftJoin('EVENT_INFO','CORP_PER_EVENT_INFO.event_id','=','EVENT_INFO.event_id')
							  ->where('CORP_PER_REL.corp_per_rel_id','=',$userId)
							  ->where('CORP_PER_EVENT_INFO.corp_per_event_stage','=','Active')
							  ->where('CORP_PER_REL.act_flg','=','A')
							  ->where('CORP_PER_EVENT_INFO.act_flg','=','A')
							  ->where('EVENT_INFO.act_flg','=','A')
							  ->orderBy('EVENT_INFO.create_dttm','desc')
							  ->get() ;

			return view('welcome')->with('event',$event);
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
