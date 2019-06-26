@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Customers <a href="{{url('customers')}}/create" style="float:right;">Add New</a></div>

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
							  <th scope="col">Address</th>
							  <th scope="col">Country</th>
							  <th scope="col">Phone</th>
							  <th scope="col">Fax</th>
							  <th scope="col">Email</th>
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
							@if(count($details) > 0)
								@foreach($details as $value) 
									<tr>
									  <th scope="row">{{ $value['id'] }}</th>
									  <td>{{ $value['first_name'] }} {{ $value['last_name'] }}</td>
									  <td>{{ $value['address'] }}</td>
									  <td>{{ $value['country'] }}</td>
									  <td>{{ $value['phone'] }}</td>
									  <td>{{ $value['fax'] }}</td>
									  <td>{{ $value['email'] }}</td>
									  <td><a href="{{ url('customers') }}/{{ $value['id'] }}/edit">Edit</a>
									  <form action="{{url('customers', [$value['id']])}}" method="POST">
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
