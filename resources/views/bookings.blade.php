@extends('layouts.app')
@section('title', 'Hotel - Bookings Listing')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Bookings <a href="{{url('booking-calendar')}}" style="float:right;">Calendar View</a></div>
				
				

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
							  <th scope="col">Room</th>
							  <th scope="col">Start Date</th>
							  <th scope="col">End Date</th>
							  <th scope="col">Customer Name</th>
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
							@if(count($details) > 0)
								@foreach($details as $value) 
									<tr>
									  <th scope="row">{{ $value['id'] }}</th>
									  <td><a href="{{ url('bookings') }}/{{ $value['id'] }}">{{ $value['rooms']['name'] }}</a></td>
									  <td>{{ date('m/d/Y',strtotime($value['start_date'])) }}</td>
									  <td>{{ date('m/d/Y',strtotime($value['end_date'])) }}</td>
									  <td>{{ $value['full_name'] }}</td>
									  <td><a href="{{ url('bookings') }}/{{ $value['id'] }}">View</a> 
									  
									  <form action="{{url('bookings', [$value['id']])}}" method="POST">
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
