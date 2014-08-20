@extends('layouts.master')

@section('content')
	<div ng-app="Roster" ng-controller="RosterCtrl" class="container spacing-top">
		<input type="hidden" id="party-id" value="{{ $party->id }}"/>
		<div class="col-md-4">
			<div class="well">
				<form>
					<div class="form-group">
						<input type="text" name="firstname" placeholder="Firstname" class="form-control" ng-model="attendeeData.firstname" required />
					</div>
					<div class="form-group">
						<input type="text" name="lastname" placeholder="Lastname" class="form-control" ng-model="attendeeData.lastname" required />
					</div>
					<div class="form-group">
						<input type="text" name="grad_year" placeholder="Graduation Year" class="form-control" ng-model="attendeeData.grad_year" required />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" ng-click="addAttendee()">
							<i class="fa fa-plus"></i> Add
						</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<input type="text" class="form-control input-lg" ng-model="attendeeQuery"/>
			<table class="table">
				<tr>
					<th>#</th>
					<th><a href="" ng-click="order('firstname')">Firstname</a></th>
					<th><a href="" ng-click="order('lastname')">Lastname</a></th>
					<th><a href="" ng-click="order('grad_year')">Graduation Year</a></th>
				</tr>
				<tbody ng-repeat="attendee in attendees | filter: filterAttendees">
					<tr>
						<td>@{{ $index }}</td>
						<td>@{{ attendee.firstname }}</td>
						<td>@{{ attendee.lastname }}</td>
						<td>@{{ attendee.grad_year }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@stop

@section('javascript')
	<script type="text/javascript">
    	var csrf_token = '{{ csrf_token() }}';
    </script>
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js')  }}
	{{ HTML::script('js/roster.js') }}
@stop

