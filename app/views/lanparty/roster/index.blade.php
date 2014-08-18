@extends('layouts.master')

@section('content')
	<div ng-app ng-controller="RosterCtrl" class="container spacing-top">
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
					<input type="text" name="lanparty_id" value="{{ $party->id }}" class="hidden" ng-model="attendeeData.lanparty_id"  />
					<input type="text" name="_token" value="{{ csrf_token() }}" class="hidden" ng-model="attendeeData._token"  />
					<div class="form-group">
						<button class="btn btn-primary" ng-click="addAttendee()">
							<i class="fa fa-plus"></i> Add
						</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<input type="hidden" id="party-id" value="{{ $party->id }}"/>
			<table class="table">
				<tr>
					<th>#</th>
					<th><a href="" ng-click="order('firstname')">Firstname</a></th>
					<th><a href="" ng-click="order('lastname')">Lastname</a></th>
					<th><a href="" ng-click="order('grad_year')">Graduation Year</a></th>
				</tr>
				<tbody ng-repeat="attendee in attendees">
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
	{{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js')  }}
	{{ HTML::script('js/roster.js') }}
@stop

