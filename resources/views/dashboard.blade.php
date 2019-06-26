@extends('layouts.app')
@section('title', 'Hotel Booking | Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<ul class="list-group">
					  
					  <li class="list-group-item"><a href="{{url('hotel-details')}}">Hotel Details</a></li>
					  <li class="list-group-item"><a href="{{url('room-type')}}">Room Type</a></li>
					  <li class="list-group-item"><a href="{{url('rooms')}}">Rooms</a></li>
					  <li class="list-group-item"><a href="{{url('prices')}}">Prices List</a></li>
					  <li class="list-group-item"><a href="{{url('bookings')}}">Bookings</a></li>
					  <li class="list-group-item"><a href="{{url('booking-calendar')}}">Bookings Calendar View</a></li>
					</ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
