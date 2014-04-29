@extends('layouts.masterWithTitle')

@section('title')
	LAN Party Roster
@stop

@section('content')
	<?php $counter = 0; ?>
	<div class="row">
		<div class="col-md-2">
			{{ HTML::linkWithIcon('roster/add', 'Add', 'plus', ['class' => 'btn btn-primary btn-lg btn-add']) }}
		</div>
		<div class="col-md-8">
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
	<div class="modal fade form-modal" id="add-modal">
		<div class="modal-dialog">
			<div class="modal-content">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <div class="modal-body">
		            @include('lanparty.roster.add')
		        </div>
		    </div>
		</div>
	</div>
@stop

@section('javascript')
	{{ HTML::script('js/jquery.dataTables.js') }}
	<script type="text/javascript">
		$(function() {
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

            $('.btn-add').on('click', function(e) {
                e.preventDefault();
                $('#add-modal').on('shown.bs.modal', function(e) {
                    $('#firstname-input').focus();
                });
            	$('#add-modal').modal();
            });
		});
	</script>
@stop