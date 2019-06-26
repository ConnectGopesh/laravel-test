<?php

namespace App\Repositories;

use App\Customer;

/**
 * Class CustomerRepository
 * @package App\Repositories
 */
class CustomerRepository
{
    /**
     * @var string
     */
    public function listCustomers()
    {
        return Customer::get()
            ->toArray();
    }
	
	public function editCustomer($id)
    {
        return Customer::find($id)
            ->toArray();
    }
	
	public function updateCustomer($data, $id)
    {
		$updateArray = array(
			'first_name' => $data->first_name,
			'last_name' => $data->last_name,
			'address' => $data->address,
			'country' => $data->country,
			'phone' => $data->phone,
			'phone' => $data->fax,
			'email' => $data->email,
		);
		
		return Customer::where('id',$id)->update($updateArray);
	   
    }
	
	public function storeCustomer($data)
    {
		$updateArray = array(
			'first_name' => $data->first_name,
			'last_name' => $data->last_name,
			'address' => $data->address,
			'country' => $data->country,
			'phone' => $data->phone,
			'phone' => $data->fax,
			'email' => $data->email,
		);
		
		return Customer::insert($updateArray);
	   
    }
	
	public function deleteCustomer($id){
		
		return Customer::where('id',$id)->delete();
    }
	
	
}
