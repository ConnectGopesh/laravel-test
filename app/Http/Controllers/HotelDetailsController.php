<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HotelDetailsService;

class HotelDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	/**
     * @var HotelDetailsService
     */
    private $hotelDetailsService;

    /**
     * HotelDetailsController constructor.
     * @param HotelDetailsService $hotelDetailsService
     */
    public function __construct(HotelDetailsService $hotelDetailsService)
    {
		$this->hotelDetailsService = $hotelDetailsService;
    }
	 
    public function index()
    {
        //
		$results = $this->hotelDetailsService->listHotelDetails();
		
		return view('hotel-details')->with('details', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       
		$editResults = $this->hotelDetailsService->editHotelDetails($id);
		
		return view('hotel-details-edit')->with('details', $editResults);
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
		//dd($request);
		$success = $this->hotelDetailsService->updateHotelDetails($request, $id);
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
        //
    }
}
