<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
	protected $table = "booking";
	
	public $timestamps = true;
	
	public function rooms()
    {
        return $this->belongsTo('App\Rooms', 'room_id', 'id');
    }
	
	public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
	
	public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
