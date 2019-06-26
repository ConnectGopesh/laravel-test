@extends('layouts.app')
@section('title', 'Hotel Booking | Room Type')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Room type <a href="{{url('room-type')}}/create" style="float:right;">Add New</a></div>
				
				

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
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
							@if(count($details) > 0)
								@foreach($details as $value) 
									<tr>
									  <th scope="row">{{ $value['id'] }}</th>
									  <td>{{ $value['name'] }}</td>
									  <td><a href="{{ url('room-type') }}/{{ $value['id'] }}/edit">Edit</a>									  
									  <form action="{{url('room-type', [$value['id']])}}" method="POST">
										   {{method_field('DELETE')}}
										   {{ csrf_field() }}
										   <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure to delete!');"/>
										</form>

</td>
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
