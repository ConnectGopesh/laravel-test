<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomsService;
use App\Repositories\RoomTypeRepository;
use App\Repositories\HotelDetailsRepository;

class RoomsController extends Controller
{
	/**
     * @var RoomsService
     */
    private $roomsService;
	
	private $roomTypeRepository;
	
	private $hotelDetailsRepository;
	
	 /**
     * roomsService constructor.
     * @param RoomsService $roomsService
     */
    public function __construct(RoomsService $roomsService, RoomTypeRepository $roomTypeRepository, HotelDetailsRepository $hotelDetailsRepository)
    {
		$this->roomsService = $roomsService;
		$this->roomTypeRepository = $roomTypeRepository;
		$this->hotelDetailsRepository = $hotelDetailsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->roomsService->listRooms();
		//dd($results);		
		return view('rooms')->with('details', $results);
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
        $request->validate([
			'name' => 'required',
			'hotel_details_id' => 'required',
			'room_type_id' => 'required',
			'image' => 'required|file'
		]);
		$success = $this->roomsService->storeRooms($request);
		return redirect('rooms')->with('status', 'Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editResults = $this->roomsService->editRooms($id);	
		$roomType = $this->roomTypeRepository->listRoomType();
		$hotelList = $this->hotelDetailsRepository->listHotelDetails();	
		return view('rooms-edit')->with('roomType', $roomType)->with('hotelList', $hotelList)->with('details', $editResults);
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
        $success = $this->roomsService->updateRooms($request, $id);
		return redirect()->back()->with('status', 'Successfully updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = $this->roomsService->deleteRooms($id);
		return redirect()->back()->with('status', 'Successfully deleted!'); 
    }
}
