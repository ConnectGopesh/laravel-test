@extends('layouts.app')
@section('title', 'Hotel Booking | Room Type Add')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('rooms')}}">Room list</a> > Add</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('rooms')}}">
					  <div class="form-group">
					  	{{ csrf_field() }}
						<label class="control-label col-sm-2" for="email">Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="">
						</div>
					  </div>
					   <div class="form-group">
						<label class="control-label col-sm-4" for="hotel_details_id">Room Capacity:</label>
						<div class="col-sm-10">
						  <select name="hotel_details_id" id="hotel_details_id" class="form-control @error('name') is-invalid @enderror">
								<option value="">Select Hotel</option>
								@foreach($hotelList as $val)
									<option value="{{$val['id']}}">{{$val['name']}}</option>
								@endforeach
							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="room_type_id">Room Type:</label>
						<div class="col-sm-10">
							<select name="room_type_id" id="room_type_id" class="form-control @error('name') is-invalid @enderror">
								<option value="">Select Room Type</option>
								@foreach($roomType as $val)
									<option value="{{$val['id']}}">{{$val['name']}}</option>
								@endforeach
							</select>
						  
						</div>
					  </div>
					 
					  <div class="form-group">
						<label class="control-label col-sm-2" for="image">Image:</label>
						<div class="col-sm-10">
						  <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
						</div>
					  </div>
					  				  
					  <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <button type="submit" class="btn btn-default" name="submit">Submit</button>
						</div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
