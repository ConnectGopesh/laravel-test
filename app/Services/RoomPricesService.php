<?php

namespace App\Services;

use App\Repositories\RoomPricesRepository;
use File;
class RoomPricesService
{

    /**
     * @var RoomPricesRepository
     */
    private $repo;


    public function __construct(RoomPricesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listPrices(){
        return $this->repo->listPrices();
    }
	public function editPrices($id){
        return $this->repo->editPrices($id);
    }
	
	public function updatePrices($data, $id){
		return $this->repo->updatePrices($data, $id);
    }
	
	public function storeRoomPrices($data){	
		return $this->repo->storeRoomPrices($data);
    }
	public function deletePrices($id){		
		return $this->repo->deletePrices($id);
    }
	

}
