@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('hotel-details')}}">Hotel Details</a> > Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('hotel-details')}}/{{ $details['id'] }}">
					  <div class="form-group">
					  	{{ csrf_field() }}
						{{ method_field('PUT') }}
						<label class="control-label col-sm-2" for="email">Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ $details['name'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Address:</label>
						<div class="col-sm-10"> 
						  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $details['address'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">State:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" value="{{ $details['state'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Country:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="{{ $details['country'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Zip Code:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Enter zip code" value="{{ $details['zip_code'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Phone:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{ $details['phone'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" value="{{ $details['email'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Image:</label>
						<div class="col-sm-10">
						  <input type="file" class="form-control" name="image">
						  <img src="{{ $details['image'] }}" title="{{ $details['name'] }}" width="100" />
						  <input type="hidden" name="old_img" value="{{ $details['image'] }}" />
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
