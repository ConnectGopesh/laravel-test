@extends('layouts.app')
@section('title', 'Hotel Booking | Price List')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Prices Management <a href="{{url('prices')}}/create" style="float:right;">Add</a></div>
				
				

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
							  <th scope="col">Room Type</th>
							  <th scope="col">Price</th>
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
							@if(count($details) > 0)
								@foreach($details as $value) 
									<tr>
									  <th scope="row">{{ $value['id'] }}</th>
									  <td>{{ $value['room_type']['name'] }}</td>
									   <td>${{ $value['price'] }}</td>
									  <td><a href="{{ url('prices') }}/{{ $value['id'] }}/edit">Edit</a> 
									  
									  <form action="{{url('prices', [$value['id']])}}" method="POST">
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
