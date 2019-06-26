<?php

namespace App\Repositories;

use App\HotelDetails;

/**
 * Class HotelDetailsRepository
 * @package App\Repositories
 */
class HotelDetailsRepository
{
    /**
     * @var string
     */
    public function listHotelDetails()
    {
        return HotelDetails::select('*')
            ->get()
            ->toArray();
    }
	
	public function editHotelDetails($id)
    {
        return HotelDetails::find($id)
            ->toArray();
    }
	
	public function updateHotelDetails($data, $id)
    {
       $updateArray = array(
	   		'name' => $data->name,
			'address' => $data->address,
			'state' => $data->state,
			'country' => $data->country,
			'zip_code' => $data->zip_code,
			'phone' => $data->phone,
			'email' => $data->email,
			'image' => $data->image,
		);
		
		return HotelDetails::where('id',$id)->update($updateArray);
	   
    }
	
	
}
