<?php

namespace App\Services;

use App\Repositories\RoomsRepository;
use File;
class RoomsService
{

    /**
     * @var RoomsRepository
     */
    private $repo;


    public function __construct(RoomsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listRooms(){
        return $this->repo->listRooms();
    }
	public function editRooms($id){
        return $this->repo->editRooms($id);
    }
	
	public function updateRooms($data, $id){
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
		return $this->repo->updateRooms($data, $id);
    }
	
	public function storeRooms($data){	
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
		} 	
		return $this->repo->storeRooms($data);
    }
	public function deleteRooms($id){		
		return $this->repo->deleteRooms($id);
    }
	

}
