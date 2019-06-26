<?php

namespace App\Repositories;

use App\Booking;
use App\RoomPriceList;
use Carbon\Carbon;

/**
 * Class BookingRepository
 * @package App\Repositories
 */
class BookingRepository
{
    /**
     * @var string
     */
    public function listBookings()
    {
        return Booking::with(['rooms','rooms.roomType', 'user'])
			->orderBy('id','DESC')
			->get()
			->toArray();
    }
	
	public function editBooking($id)
    {
        return Booking::with(['rooms','rooms.roomType', 'user'])->find($id)
            ->toArray();
    }
	
	
	public function deleteBooking($id){
		
		return Booking::where('id',$id)->delete();
    }
	
	
	public function findBookingDetails($data){
		
		$room_type_id = $data->room_type_id;
		
		return $result = RoomPriceList::with(['rooms.roomType'])
			->where("room_type_id", $room_type_id)
			->first();
    }
	
	public function submitBookingDetails($data){
		//dd($data);
		$booking = new Booking();
		
		$startDate = Carbon::createFromFormat('m/d/Y', $data->start_date)->format('Y-m-d');
		$endDate = Carbon::createFromFormat('m/d/Y', $data->end_date)->format('Y-m-d');
		
		$booking->room_id = $data->room_id;
		$booking->start_date = $startDate;
		$booking->end_date = $endDate;
		$booking->full_name = $data->full_name;
		$booking->email = $data->email;
		$booking->phone = $data->phone;
		$booking->total_nights = $data->total_nights;
		$booking->total_prices = $data->total_prices;
		
		try {
            if (!$booking->save()) {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }

        return $booking;
		
    }
	
	
}
