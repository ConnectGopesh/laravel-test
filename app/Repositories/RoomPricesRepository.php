<?php

namespace App\Repositories;

use App\RoomPriceList;
use App\Prices;
use App\RegularPrices;
use App\DynamicPrices;

/**
 * Class RoomPricesRepository
 * @package App\Repositories
 */
class RoomPricesRepository
{
    /**
     * @var string
     */
	 
	
    public function listPrices()
    {
        return RoomPriceList::with(['roomType'])->get()->toArray();
    }
	
	public function editPrices($id)
    {
        return RoomPriceList::find($id)
            ->toArray();
    }
	
	public function storeRoomPrices($data)
    {
		$insertArr = array(
				'room_type_id' => $data['room_type_id'],
				'price' => $data['price'],
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);
			
		return RoomPriceList::insert($insertArr);		   
    }
	
	public function updatePrices($data, $id)
	{
		$insertArr = array(
			'room_type_id' => $data['room_type_id'],
			'price' => $data['price'],
			'updated_at' => date('Y-m-d H:i:s')
		);
			
		return RoomPriceList::where("id",$id)->update($insertArr);	
		
	}
	
	
	
	public function deletePrices($id){
		return RoomPriceList::where('id',$id)->delete();
    }
	
	
}
