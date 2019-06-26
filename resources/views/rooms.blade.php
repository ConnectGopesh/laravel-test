@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Rooms <a href="{{url('rooms')}}/create" style="float:right;">Add</a></div>
				
				

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
							  <th scope="col">Hotel Name</th>
							  <th scope="col">Room Type</th>
							  <th scope="col">Image</th>
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
							@if(count($details) > 0)
								@foreach($details as $value) 
									<tr>
									  <th scope="row">{{ $value['id'] }}</th>
									  <td>{{ $value['name'] }}</td>
									  <td>{{ $value['hotel_details']['name'] }}</td>
									  <td>{{ $value['room_type']['name'] }}</td>
									  <td><img src="{{ $value['image'] }}" width="100" /></td>
									  <td><a href="{{ url('rooms') }}/{{ $value['id'] }}/edit">Edit</a> 
									  
									  <form action="{{url('rooms', [$value['id']])}}" method="POST">
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
