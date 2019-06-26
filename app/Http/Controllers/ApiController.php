<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Services\RoomTypeService;
use App\Helpers\Helper;

class ApiController extends Controller
{
    /**
     * @var bookingService
     */
    private $bookingService;
	
	private $roomTypeService;
	
	/**
     * BookingService constructor.
     * @param BookingService $bookingService
    */
    public function __construct(BookingService $bookingService, RoomTypeService $roomTypeService)
    {
		$this->bookingService = $bookingService;
		$this->roomTypeService = $roomTypeService;
    }
	
	function roomType() {
		$result = $this->roomTypeService->listRoomType();
		return response()->json([
            'success' => 'true',
            'booking_results' => $result
        ]);
	}
	
	function bookingSearch(Request $request) {
		//\DB::connection()->enableQueryLog();
		$results = $this->bookingService->findBookingDetails($request);
		//$queries = \DB::getQueryLog();
        //dd($queries);
		
		$totalDays = Helper::calculateDays($request['start_date'],$request['end_date']);
		
		$totalPrice = (int) $totalDays * (int) $results->price;
		
		$finalResults = array();
		$finalResults['start_date'] = $request['start_date'];
		$finalResults['end_date'] = $request['end_date'];
		$finalResults['totalDays'] = $totalDays;
		$finalResults['totalPrice'] = $totalPrice;
		$finalResults['rooms'] = $results->rooms;
		
		
		return response()->json([
            'success' => 'true',
            'booking_results' => $finalResults
        ]);
		
	}
	
	function reservationSubmit(Request $request) {
		
		$results = $this->bookingService->submitBookingDetails($request);
		
		if($results) { 
			return response()->json([
				'success' => 'true',
			]);
		} else {
			return response()->json([
				'success' => 'false',
			]);	
		}
	}
	
	
}
