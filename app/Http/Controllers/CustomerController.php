<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;

class CustomerController extends Controller
{
	/**
     * @var CustomerService
     */
    private $customerService;
	 /**
     * CustomerService constructor.
     * @param RoomTypeService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
		$this->customerService = $customerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = $this->customerService->listCustomers();		
		return view('customers')->with('details', $results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'phone' => 'required|string',
			'email' => 'required|email',
		]);
		$success = $this->customerService->storeCustomer($request);
		return redirect('customer')->with('status', 'Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editResults = $this->customerService->editCustomer($id);		
		return view('customer-edit')->with('details', $editResults);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $success = $this->customerService->updateCustomer($request, $id);
		return redirect()->back()->with('status', 'Successfully updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = $this->customerService->deleteCustomer($id);
		return redirect()->back()->with('status', 'Successfully deleted!');   
    }
}
