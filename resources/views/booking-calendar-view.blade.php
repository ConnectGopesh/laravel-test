@extends('layouts.app-header')
@section('title', 'Hotel - Booking Details')
@section('content')
<?php
$jsonData = json_encode($details);
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="{{url('dashboard')}}">Admin Dashboard</a> > Bookings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					<div id='calendar'></div>
					
                </div>
            </div>
        </div>
    </div>
	
	<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					<h4>Booking Details</h4>
					<table class="table">								
						<tr><td>Start Date: </td><td id="startDate"></td></tr>
						<tr><td>End Date: </td><td id="endDate"></td></tr>
						<tr><td>Total Nights: </td><td id="totalNights"></td></tr>
						<tr><td>Total Price: </td><td id="totalPrices"></td></tr>
						<tr><td>Image: </td><td><img id="image" src="" width="100" /></td></tr>
						<tr><td>Room Name: </td><td id="roomName"></td></tr>
						<tr><td>Room Type: </td><td id="roomType"></td></tr>														
						<tr><td>Booking Date:</td><td id="bookingDate"></td></tr>
					</table>
					<h4>Customer Information</h4>
					<table class="table">
						<tr><td>Customer Name: </td><td id="name"></td></tr>
						<tr><td>Email: </td><td id="email"></td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>


</div>

<script>

$(document).ready(function() {
  	var calendar = $('#calendar').fullCalendar({
		// put your options and callbacks here
		header: {
		  left: 'prev,next today',
		  center: 'title',
		  right: 'year,month'
		
		},
		timezone: 'local',
		height: "auto",
		selectable: true,
		dragabble: true,
		defaultView: 'year',
		yearColumns: 3,
		
		durationEditable: true,
		bootstrap: false,
		
		events: [
			<?php
			foreach($details as $value) {
				
				echo '{';
				echo "id:".$value['id'].",";
				echo "title:'".$value['rooms']['name']."',";
				echo "start:'".$value['start_date']."',";
				echo "end:'".$value['end_date']."',";
				echo "totalNights:'".$value['total_nights']."',";
				echo "totalPrices:'$".$value['total_prices']."',";
				echo "roomType:'".$value['rooms']['room_type']['name']."',";
				echo "bookingDate:'".$value['created_at']."',";
				echo "image:'".$value['rooms']['image']."',";
				echo "name:'".$value['full_name']."',";				
				echo "email:'".$value['email']."',";
				echo "},";	
			}
			?>
		],
		eventClick: function(event) {
			var startD = new Date(event.start);
			var startDate =  startD.getMonth()+"/"+startD.getDay()+"/"+startD.getYear();
			var endD = new Date(event.end);
			var endDate =  endD.getMonth()+"/"+endD.getDay()+"/"+endD.getYear();
			$("#successModal").modal("show");
			$("#startDate").text(startDate);
			$("#endDate").text(endDate);
			$("#totalNights").text(event.totalNights);
			$("#totalPrices").text(event.totalPrices);
			$("#roomName").text(event.title);
			$("#roomType").text(event.roomType);
			$("#bookingDate").text(event.bookingDate);
			$("#image").attr('src',event.image);
			$("#name").text(event.name);
			$("#email").text(event.email);
			
		}
	})
});
	
</script>
<style>

body {
	margin: 40px 10px;
	padding: 0;
	font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	font-size: 14px;
}

#calendar {
	max-width: 900px;
	margin: 0 auto;
}
.fc-license-message{display: none;}
body {
margin: 0;
padding: 0;
font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
font-size: 14px;
}
#calendar {
max-width: 900px;
margin: 50px auto;
}
.fc-event{cursor: pointer;}

</style>
@endsection
