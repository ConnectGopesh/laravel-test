<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomPriceList extends Model
{
    //
	protected $table = "room_price_list";
	
	public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
	
	public function rooms()
    {
        return $this->hasMany('App\Rooms', 'room_type_id', 'room_type_id');
    }
}
