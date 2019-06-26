<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomTypeService;

class RoomTypeController extends Controller
{
	/**
     * @var RoomTypeService
     */
    private $roomTypeService;
	 /**
     * RoomTypeController constructor.
     * @param RoomTypeService $RoomTypeService
     */
    public function __construct(RoomTypeService $roomTypeService)
    {
		$this->roomTypeService = $roomTypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->roomTypeService->listRoomType();		
		return view('room-type')->with('details', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room-type-add');
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
		]);
		$success = $this->roomTypeService->storeRoomType($request);
		return redirect('room-type')->with('status', 'Successfully added!');
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
        $editResults = $this->roomTypeService->editRoomType($id);		
		return view('room-type-edit')->with('details', $editResults);
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
		$success = $this->roomTypeService->updateRoomType($request, $id);
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
        $success = $this->roomTypeService->deleteRoomType($id);
		return redirect()->back()->with('status', 'Successfully deleted!');   
    }
}
