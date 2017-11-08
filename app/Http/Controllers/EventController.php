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
					->where(function ($query) {
						$query->where('person_name','like','%THA%')
							  ->orWhere('corp_name','like','%นิล%');
							})
					// ->groupBy('person_name','corp_name','person_mob','person_email','corp_per_rel_id')	
					// ->orderBy('ID')
					->get();
		return view('searchBuyerDetails')->with('event',$event)->with('buyer',$buyer);
	}
}
