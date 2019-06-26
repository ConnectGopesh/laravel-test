<?php

namespace App\Services;

use App\Repositories\BookingRepository;
use File;
class BookingService
{

    /**
     * @var RoomsRepository
     */
    private $repo;


    public function __construct(BookingRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listBookings(){
        return $this->repo->listBookings();
    }
	public function editBooking($id){
        return $this->repo->editBooking($id);
    }
	
	public function deleteBooking($id){		
		return $this->repo->deleteBooking($id);
    }
	
	public function findBookingDetails($data){		
		return $this->repo->findBookingDetails($data);
    }
	
	public function submitBookingDetails($data){		
		return $this->repo->submitBookingDetails($data);
    }
	

}
