<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class EventController extends Controller
{
	
	public function index($eventId){
		$event = Event::where('event_id',$eventId)->get();
		return view('searchBuyer')->with('event',$event);
	}

	public function search($eventId,Request $request){
		$event = Event::where('event_id',$eventId)->get();
		$criteria = $request->input('criteria');

		$buyer = DB::table('SEARCH_BUYER')
					->where('ID','=','2')
					->where(function ($query) use ($criteria) {
						$query->where('person_name','like', '%' . $criteria . '%')
							  ->orWhere('corp_name','like', '%' . $criteria . '%');
						})
					// ->groupBy('person_name','corp_name','person_mob','person_email','corp_per_rel_id')	
					// ->orderBy('ID')
					->get();
		return view('searchBuyerDetails')->with('event',$event)->with('buyer',$buyer)->with('criteria',$criteria);
	}

	public function appointment($criteria, $cprId, Request $request){
		$criteria = Crypt::decrypt($criteria);
		$buyer = DB::table('SEARCH_BUYER')
					->where('ID','=','2')
					->where(function ($query) use ($criteria) {
						$query->where('person_name','like','%'.$criteria.'%')
							  ->orWhere('corp_name','like','%'.$criteria.'%');
							})
					// ->groupBy('person_name','corp_name','person_mob','person_email','corp_per_rel_id')	
					// ->orderBy('ID')
					->where('corp_per_rel_id','=',$cprId)
					->get();

		return view('appointment')->with('buyer',$buyer)->with('criteria',$criteria);
	}

	public function insert(Request $request){
		$appt_topic = $request->input('appt_topic');
		$appt_when_std_dttm = $request->input('stddt');
		$appt_when_end_dttm = $request->input('enddt');
		$appt_where = $request->input('appt_where');
		$corp_per_rel_id = $request->input('rel');
		$criteria = $request->input('criteria');
		$user = $request->session()->get('user');

		$insert = DB::table('appt_match')
				  ->insert(
					  ['appt_topic' => 'ทดสอบ',
					   'appt_when_std_dttm' => $appt_when_std_dttm,
					   'appt_when_end_dttm' => $appt_when_end_dttm,
					   'appt_req_id' => $user[0]->corp_per_rel_id,
					   'appt_tar_id' => $corp_per_rel_id,
					   'appt_where' => 'Boot 12A',
					   'appt_stage' =>'Accept',
					   'appt_remind_before' =>'15',
					   'act_flg' =>'A',
					   'create_by' => $user[0]->username,
					   'update_by' => $user[0]->username
					  ]
				  );

		$buyer = DB::table('SEARCH_BUYER')
					->where('ID','=','2')
					->where(function ($query) use ($criteria) {
						$query->where('person_name','like','%'.$criteria.'%')
							  ->orWhere('corp_name','like','%'.$criteria.'%');
							})
					// ->groupBy('person_name','corp_name','person_mob','person_email','corp_per_rel_id')	
					// ->orderBy('ID')
					->where('corp_per_rel_id','=',$corp_per_rel_id)
					->get();

		return view('appointment')->with('buyer',$buyer)->with('criteria',$criteria);
	}

	public function checkDate(Request $request){
		$appt_when_std_dttm = $request->input('stdDatetime');
		$appt_when_end_dttm = $request->input('endDatetime');
		$check = $request->input('check');

		if($check == 'start'){
			$result = DB::table('appt_match')
						->where('appt_when_std_dttm','=',$appt_when_std_dttm)
						->get();
			return $result ;
		} else if($check == 'end') {
			$result = DB::table('appt_match')
						->where('appt_when_end_dttm','=',$appt_when_end_dttm)
						->get();
			return $result ;
		}
	}
}
