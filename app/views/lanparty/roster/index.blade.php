@extends('layouts.master')

@section('content')
	<div ng-app="Roster" ng-controller="RosterCtrl" class="container spacing-top">
		<input type="hidden" id="party-id" value="{{ $party->id }}"/>
		<div class="col-md-4">
			<div id="roster-sidebar">
				<div class="well">
					<form>
						<div class="form-group">
							<input type="text" name="firstname" placeholder="Firstname" class="form-control" ng-model="attendeeData.firstname" required />
						</div>
						<div class="form-group">
							<input type="text" name="lastname" placeholder="Lastname" class="form-control" ng-model="attendeeData.lastname" required />
						</div>
						<div class="form-group">
							<input type="text" name="year" placeholder="Graduation Year" class="form-control" ng-model="attendeeData.year" required />
						</div>
						<div class="form-group">
							<button class="btn btn-primary" ng-click="addAttendee()">
								<i class="fa fa-plus"></i> Add
							</button>
						</div>
					</form>
				</div>
				<div class="well">
					<input type="text" class="form-control input-lg" ng-model="attendeeQuery" placeholder="Filter attendees" />
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-striped">
				<tr>
					<th>#</th>
					<th><a href="" ng-click="order('firstname')">Firstname</a></th>
					<th><a href="" ng-click="order('lastname')">Lastname</a></th>
					<th><a href="" ng-click="order('year')">Graduation Year</a></th>
					<th><a href="" ng-click="order('has_attended')">Attendance</a></th>
				</tr>
				<tbody>
					<tr ng-repeat="attendee in attendees | filter: filterAttendees" ng-class="{strike: attendee.has_attended == 1}">
						<td>@{{ $index }}</td>
						<td>@{{ attendee.firstname }}</td>
						<td>@{{ attendee.lastname }}</td>
						<td>@{{ attendee.year }}</td>
						<td><a href="" ng-click="toggleAttendance(attendee.id)">Toggle attendance</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div id="bottom"></div>
@stop

@section('javascript')
	{{ HTML::script('js/admin.js') }}
	<script type="text/javascript">
    	var csrf_token = '{{ csrf_token() }}';

    	$(function() {
	     	$('#roster-sidebar').affix({
	       		offset: {
	        		top: 100,
	        		bottom: function () {
	        			return (this.bottom = $('#bottom').outerHeight(true))
	       			}
	      		}
	     	});
	    });
    </script>
@stop

