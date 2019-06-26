<?php

namespace App\Repositories;

use App\RoomType;

/**
 * Class HotelDetailsRepository
 * @package App\Repositories
 */
class RoomTypeRepository
{
    /**
     * @var string
     */
    public function listRoomType()
    {
        return RoomType::get()
            ->toArray();
    }
	
	public function editRoomType($id)
    {
        return RoomType::find($id)
            ->toArray();
    }
	
	public function updateRoomType($data, $id)
    {
       $updateArray = array(
	   		'name' => $data->name,
		);
		
		return RoomType::where('id',$id)->update($updateArray);
	   
    }
	
	public function storeRoomType($data)
    {
       $addArray = array(
	   		'name' => $data->name,
		);
		
		return RoomType::insert($addArray);
	   
    }
	
	public function deleteRoomType($id){
		
		return RoomType::where('id',$id)->delete();
    }
	
	
}
