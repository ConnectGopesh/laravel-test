@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > <a href="{{url('room-type')}}">Room type list</a> > Add</div>

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
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('room-type')}}">
					  <div class="form-group">
					  	{{ csrf_field() }}
						<label class="control-label col-sm-2" for="email">Name:</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter name" value="">
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
