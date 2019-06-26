<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use File;
class CustomerService
{

    /**
     * @var CustomerRepository
     */
    private $repo;


    public function __construct(CustomerRepository $repo)
    {
        $this->repo = $repo;
    }

    public function listCustomers(){
        return $this->repo->listCustomers();
    }
	public function editCustomer($id){
        return $this->repo->editCustomer($id);
    }
	
	public function updateCustomer($data, $id){		
		return $this->repo->updateCustomer($data, $id);
    }
	
	public function storeCustomer($data){		
		return $this->repo->storeCustomer($data);
    }
	public function deleteCustomer($id){		
		return $this->repo->deleteCustomer($id);
    }
	

}
