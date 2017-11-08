<?php

namespace App\Http\Controllers;

use DB;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
	
	public function index($eventId){
		$event = Event::where('event_id',$eventId)->get();
		return view('searchBuyer')->with('event',$event);
	}

	public function search($eventId,Request $request){
		$event = Event::where('event_id',$eventId)->get();
		$buyer = DB::table('SEARCH_BUYER')
					->where('ID','=','2')
					->where('person_name','like','%THA%')
					->orWhere('corp_name','like','%นิล%')
					// ->groupBy('person_name','corp_name','person_mob','person_email','corp_per_rel_id')	
					// ->orderBy('ID')
					->get();

					

		/*$buyer = DB::table('CORP_PER_REL')
                        ->leftJoin('PERSON_INFO','CORP_PER_REL.person_id', '=' , 'PERSON_INFO.person_id')
                        ->leftJoin('CORP_INFO','CORP_PER_REL.corp_id','=','CORP_INFO.corp_id')
                        ->leftJoin('CORP_PER_EVENT_INFO','CORP_PER_REL.corp_per_rel_id','=','CORP_PER_EVENT_INFO.corp_per_rel_id')
                        ->leftJoin(DB::table('CORP_PER_EVENT_MAIN_TAR')
                        				->leftJoin('MAIN_TAR_TYPE','CORP_PER_EVENT_MAIN_TAR.main_tar_type_id','=','MAIN_TAR_TYPE.main_tar_type_id')
                        				->leftJoin('CORP_PER_EVENT_INFO','CORP_PER_EVENT_INFO.corp_per_event_id','=','CORP_PER_EVENT_MAIN_TAR.corp_per_event_id')
                        				->leftJoin('CORP_PER_REL','CORP_PER_REL.corp_per_rel_id','=','CORP_PER_EVENT_INFO.corp_per_rel_id')
                        				->where('CORP_PER_EVENT_MAIN_TAR.type_desc','=','Target')
                        	,'CORP_PER_REL.corp_per_rel_id','=','MAIN_TAR_TYPE.main_tar_type_id')
                        ->where('CORP_PER_EVENT_MAIN_TAR','=','Target')
                        ->where('CORP_PER_REL.act_flg','=','A')
                        ->where('PERSON_INFO.person_name','like','%THA%')
                        ->where('CORP_INFO.corp_name','like','%นิล%')
                        ->get();*/

		return view('searchBuyer')->with('event',$event)->with('buyer',$buyer);
	}
}
