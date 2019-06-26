@extends('layouts.app-header')
@section('title', 'Hotel Booking | Price Add')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('prices')}}">Prices Management</a> > Add</div>

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
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('prices')}}">						
					  	{{ csrf_field() }}
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Room Type:</label>
						<div class="col-sm-10">
							<select name="room_type_id" class="form-control @error('name') is-invalid @enderror">
								<option value="">Select Room Type</option>
								@foreach($roomType as $val)
									<option value="{{$val['id']}}">{{$val['name']}}</option>
								@endforeach
							</select>
						  
						</div>
					  </div>
					  
					 <div class="form-group">
						<label class="control-label col-sm-2" for="price">Price:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter price" value="{{ old('price') }}">
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
