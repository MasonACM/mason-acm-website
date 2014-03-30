@extends('layouts.masterWithTitle')

@section('title')
	LAN Party Roster
@stop

@section('content')
	<?php $counter = 0; ?>
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
@stop

@section('javascript')
	{{ HTML::script('js/jquery.dataTables.js') }}
	
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
	</script>
@stop