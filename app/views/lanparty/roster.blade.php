@extends('layouts.master')

@section('title')
	LAN Party Roster
@stop

@section('content')
	<?php $counter = 0; ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table" id="roster">
				<thead>
					<tr class="header-white">
						<th> # </td>
						<th> First Name </td>
						<th> Last Name  </td>
					</tr>
				</thead>
				
				<tbody>
					@foreach($attendees as $attendee) 
						<tr>
							<td> {{ ++$counter }}
							<td> {{ $attendee->firstname }} </td>
							<td> {{ $attendee->lastname  }} </td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">
		$('#roster').dataTable( {
		    "bPaginate": false,
		    "bLengthChange": false,
		    "bFilter": true,
		    "bSort": false,
		    "bInfo": false,
		    "bAutoWidth": false,
		    "oLanguage": { "sSearch": "" }
		});

		$('.dataTables_filter input').addClass('form-control');
	</script>
@stop