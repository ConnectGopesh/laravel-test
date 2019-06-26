@extends('layouts.app')
@section('title', 'Hotel - Booking Details')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('bookings')}}">Bookings</a> > View</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<div class="container">
						<div class="row">
							<h4>Booking Information</h4>
							<table class="table">								
								<tr><td>Start Date: </td><td>{{date('m/d/Y',strtotime($details['start_date']))}}</td></tr>
								<tr><td>End Date: </td><td>{{date('m/d/Y',strtotime($details['end_date']))}}</td></tr>
								<tr><td>Total Nights: </td><td>{{$details['total_nights']}}</td></tr>
								<tr><td>Total Price: </td><td>${{$details['total_prices']}}</td></tr>	
								<tr><td>Image: </td><td><img src="{{$details['rooms']['image']}}" width="100" /></td></tr>
								<tr><td>Room Name: </td><td>{{$details['rooms']['name']}}</td></tr>
								<tr><td>Room Type: </td><td>{{$details['rooms']['room_type']['name']}}</td></tr>
															
								<tr><td>Booking Date:</td><td>{{date('m/d/Y h:i A',strtotime($details['created_at']))}}</td></tr>
							</table>
							
							<h4>Customer Information</h4>
							<table class="table">
								<tr><td>Customer Name: </td><td>{{$details['full_name']}}</td></tr>
								<tr><td>Email: </td><td>{{$details['email']}}</td></tr>
							</table>
						</div>
					</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
