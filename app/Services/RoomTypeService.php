<?php

namespace App\Services;

use App\Repositories\RoomTypeRepository;
use File;
class RoomTypeService
{

    /**
     * @var RoomTypeRepository
     */
    private $repo;


    public function __construct(RoomTypeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listRoomType(){
        return $this->repo->listRoomType();
    }
	public function editRoomType($id){
        return $this->repo->editRoomType($id);
    }
	
	public function updateRoomType($data, $id){		
		return $this->repo->updateRoomType($data, $id);
    }
	
	public function storeRoomType($data){		
		return $this->repo->storeRoomType($data);
    }
	public function deleteRoomType($id){		
		return $this->repo->deleteRoomType($id);
    }
	

}
