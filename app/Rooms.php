<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    //
	/**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
	
	public function hotelDetails()
    {
        return $this->belongsTo('App\HotelDetails');
    }
}
