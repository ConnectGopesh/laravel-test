@extends('layouts.app')
@section('title', 'Hotel Booking | Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Hotel Details</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="">
						<table class="table">
						  <thead>
							<tr>
							  <th scope="col">#</th>
							  <th scope="col">Name</th>
							  <th scope="col">Address</th>
							  <th scope="col">State</th>
							  <th scope="col">Country</th>
							  <th scope="col">Zip</th>
							  <th scope="col">Phone</th>
							  <th scope="col">Email</th>
							  <th scope="col">Image</th>
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
							@if(count($details) > 0)
								@foreach($details as $value) 
									<tr>
									  <th scope="row">{{ $value['id'] }}</th>
									  <td>{{ $value['name'] }}</td>
									  <td>{{ $value['address'] }}</td>
									  <td>{{ $value['state'] }}</td>
									  <td>{{ $value['country'] }}</td>
									  <td>{{ $value['zip_code'] }}</td>
									  <td>{{ $value['phone'] }}</td>
									  <td>{{ $value['email'] }}</td>
									  <td><img src="{{ $value['image'] }}" title="{{ $value['name'] }}" width="100" /></td>
									  <td><a href="{{ url('hotel-details') }}/{{ $value['id'] }}/edit">Edit</a></td>
									</tr>
								@endforeach
							@endif
							
						 </tbody>
						</table>
							
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
