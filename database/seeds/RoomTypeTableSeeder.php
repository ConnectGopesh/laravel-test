<?php

use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$roomType = array('Deluxe', 'Standard');
		foreach($roomType as $value) {
			DB::table('room_type')->insert([
            	'name' => $value,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
        	]);
		}       
    }
}
