<?php

namespace App\Repositories;

use App\Rooms;

/**
 * Class RoomsRepository
 * @package App\Repositories
 */
class RoomsRepository
{
    /**
     * @var string
     */
    public function listRooms()
    {
        return Rooms::with(['roomType','HotelDetails'])->get()->toArray();
    }
	
	public function editRooms($id)
    {
        return Rooms::find($id)
            ->toArray();
    }
	
	public function updateRooms($data, $id)
    {
       $updateArray = array(
	   		'name' => $data->name,
			'hotel_details_id' => $data->hotel_details_id,
			'room_type_id' => $data->room_type_id,
			'image' => $data->image,
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		return Rooms::where('id',$id)->update($updateArray);
	   
    }
	
	public function storeRooms($data)
    {
       $addArray = array(
	   		'name' => $data->name,
			'hotel_details_id' => $data->hotel_details_id,
			'room_type_id' => $data->room_type_id,			
			'image' => $data->image,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		);
		
		return Rooms::insert($addArray);
	   
    }
	
	public function deleteRooms($id){
		
		return Rooms::where('id',$id)->delete();
    }
	
	
}
