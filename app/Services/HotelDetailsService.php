<?php

namespace App\Services;

use App\Repositories\HotelDetailsRepository;
use File;
class HotelDetailsService
{

    /**
     * @var HotelDetailsRepository
     */
    private $repo;


    public function __construct(HotelDetailsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listHotelDetails(){
        return $this->repo->listHotelDetails();
    }
	public function editHotelDetails($id){
        return $this->repo->editHotelDetails($id);
    }
	
	public function updateHotelDetails($data, $id){
		
		$path = public_path().'/images';
		if(!File::isDirectory($path)){
			File::makeDirectory($path, 0777, true, true);
		}

		if($data->file('image')) {
			$image = $data->file('image');
			$imagename = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath, $imagename);
			$data->image = url('')."/images/".$imagename;
		} else {
			$data->image = $data->old_img;
		}
        return $this->repo->updateHotelDetails($data, $id);
    }
	

}
