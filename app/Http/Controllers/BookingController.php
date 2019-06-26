<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Helpers\Helper;

class BookingController extends Controller
{
	/**
     * @var bookingService
     */
    private $bookingService;
	 /**
     * BookingService constructor.
     * @param BookingService $bookingService
     */
    public function __construct(BookingService $bookingService)
    {
		$this->bookingService = $bookingService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->bookingService->listbookings();	
		return view('bookings')->with('details', $results);
    }
	
	public function BookingCalendarView() {
		$results = $this->bookingService->listbookings();	
		return view('booking-calendar-view')->with('details', $results);
	}
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = $this->roomTypeRepository->listRoomType();
		$hotelList = $this->hotelDetailsRepository->listHotelDetails();
        return view('rooms-add')->with('roomType', $roomType)->with('hotelList', $hotelList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewResults = $this->bookingService->editBooking($id);	
			//
		//$totalDays = Helper::calculateDays($viewResults['start_date'],$viewResults['end_date']);
		
		//$viewResults['totalDays'] = $totalDays;
		
		return view('booking-view')->with('details', $viewResults);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = $this->bookingService->deleteBooking($id);
		return redirect()->back()->with('status', 'Successfully deleted!');   
    }
}
