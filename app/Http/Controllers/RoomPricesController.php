<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RoomPricesService;
use App\Repositories\RoomTypeRepository;
use App\Repositories\RoomCapacityRepository;

class RoomPricesController extends Controller
{
	/**
     * @var RoomPricesService
     */
    private $roomPricesService;
	
	private $roomTypeRepository;
	
	 /**
     * roomsService constructor.
     * @param RoomsService $roomsService
     */
    public function __construct(RoomPricesService $roomPricesService, RoomTypeRepository $roomTypeRepository)
    {
		$this->roomPricesService = $roomPricesService;
		$this->roomTypeRepository = $roomTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->roomPricesService->listPrices();
		return view('room-prices')->with('details', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//dd( $this->getWeeks(6,2019));
		$roomType = $this->roomTypeRepository->listRoomType();
        return view('prices-add')
			->with('roomType', $roomType);
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
			'room_type_id' => 'required',
			'price' => 'required'
		]);
		$success = $this->roomPricesService->storeRoomPrices($request);
		return redirect('prices')->with('status', 'Successfully added!');
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
        $editResults = $this->roomPricesService->editPrices($id);	
		//dd($editResults);
		$roomType = $this->roomTypeRepository->listRoomType();

		return view('prices-edit')
			->with('roomType', $roomType)
			->with('details', $editResults);
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
		//echo "<pre>";
		//print_r($_POST); die;
        $success = $this->roomPricesService->updatePrices($request, $id);
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
        $success = $this->roomPricesService->deletePrices($id);
		return redirect()->back()->with('status', 'Successfully deleted!'); 
    }
	
	
	
	function getWeeks($month,$year){
		$month = intval($month);				//force month to single integer if '0x'
		$suff = array('st','nd','rd','th','th','th'); 		//week suffixes
		$end = date('t',mktime(0,0,0,$month,1,$year)); 		//last date day of month: 28 - 31
		$start = date('w',mktime(0,0,0,$month,1,$year)); 	//1st day of month: 0 - 6 (Sun - Sat)
		$last = 7 - $start; 					//get last day date (Sat) of first week
		$noweeks = ceil((($end - ($last + 1))/7) + 1);		//total no. weeks in month
		$output = "";						//initialize string		
		$monthlabel = str_pad($month, 2, '0', STR_PAD_LEFT);
		$weekArr = array();
		for($x=1;$x<$noweeks+1;$x++){	
			if($x == 1){
				$startdate = "$year-$monthlabel-01";
				$day = $last - 6;
			}else{
				$day = $last + 1 + (($x-2)*7);
				$day = str_pad($day, 2, '0', STR_PAD_LEFT);
				$startdate = "$year-$monthlabel-$day";
			}
			if($x == $noweeks){
				$enddate = "$year-$monthlabel-$end";
			}else{
				$dayend = $day + 6;
				$dayend = str_pad($dayend, 2, '0', STR_PAD_LEFT);
				$enddate = "$year-$monthlabel-$dayend";
			}
			$output .= "{$x}{$suff[$x-1]} week -> Start date=$startdate End date=$enddate <br />";
			$weekArr[] = array("start_date"=>$startdate, "end_date"=>$enddate);	
		}
		return $weekArr;
	}
}
