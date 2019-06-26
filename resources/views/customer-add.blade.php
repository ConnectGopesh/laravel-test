@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('customers')}}">Customers</a> > Add</div>

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
					
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('customers')}}">
					  <div class="form-group">
					  	{{ csrf_field() }}
						<label class="control-label col-sm-2" for="name">First Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" placeholder="Enter first name" value="{{ old('first_name') }}" required="required" >
						</div>
					  </div>
					  <div class="form-group">					  
						<label class="control-label col-sm-2" for="name">Last Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="Enter last name" value="{{ old('last_name') }}" required="required">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="pwd">Address:</label>
						<div class="col-sm-10"> 
						  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ old('address') }}">
						</div>
					  </div>
					  
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Country:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" value="{{ old('country') }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Phone:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Enter phone" value="{{ old('phone') }}" required="required">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="fax">Fax:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter phone" value="{{ old('fax') }}">
						</div>
					  </div>
					  <div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
						  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email"  value="{{ old('email') }}" required="required">
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
