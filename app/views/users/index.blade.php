@extends('layouts.master')

@section('content')
	<div class="container" ng-app="UserList" ng-controller="ListCtrl">
		<div class="row spacing-top">
			<div class="col-md-1">
				<label for="count"># Per page</label>
				<input type="text" name="count" class="form-control" ng-model="perPage" ng-change="getUsers()">
			</div>
			<div class="col-md-11"> 
			    <pagination total-items="items" ng-model="page" max-size="maxSize" items-per-page="perPage" class="pagination-md" boundary-links="true" ng-change="pageChanged()"></pagination>
			</div>
		</div>
		<table class="table">
			<thead>
				<td><a href="" ng-click="order('email')">Email</a></td>
				<td><a href="" ng-click="order('firstname')">Firstname</a></td>
				<td><a href="" ng-click="order('lastname')">Lastname</a></td>
				<td><a href="" ng-click="order('grad_year')">Graduation year</a></td>
			</thead>
			<tbody>
				<tr ng-repeat="user in users">
					<td>@{{user.email}}</td>
					<td>@{{user.firstname}}</td>
					<td>@{{user.lastname}}</td>
					<td>@{{user.grad_year}}</td>
				</tr>
			</tbody>
		</table>
	</div>
@stop

@section('javascript')
	<script type="text/javascript">
    	var csrf_token = '{{ csrf_token() }}';
    </script>
    {{ HTML::script('js/admin.js') }}
@stop