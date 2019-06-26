@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('customers')}}">Customers</a> > Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('customers')}}/{{ $details['id'] }}">
					  <div class="form-group">
					  	{{ csrf_field() }}
						{{ method_field('PUT') }}
						<label class="control-label col-sm-2" for="name">First Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" value="{{ $details['first_name'] }}">
						</div>
					  </div>
					  <div class="form-group">					  
						<label class="control-label col-sm-2" for="name">Last Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" value="{{ $details['last_name'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Address:</label>
						<div class="col-sm-10"> 
						  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $details['address'] }}">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Country:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="{{ $details['country'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Phone:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{ $details['phone'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="fax">Fax:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter phone" value="{{ $details['fax'] }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" value="{{ $details['email'] }}">
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
