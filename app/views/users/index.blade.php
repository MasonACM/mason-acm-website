@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-users"></i> Users</h1>	
		</div>
	</div>
	<div class="container" ng-app="UserList" ng-controller="ListCtrl">
		<div class="row form-group">
			<div class="col-md-1">
				<label for="count"># Per page</label>
				<input type="text" name="count" class="form-control" ng-model="count" ng-change="getUsers()">
			</div>
			<div class="col-md-11">
				<p>Page @{{ page }} of @{{ lastPage }}</p>
				<ul class="pagination">
					<li ng-class="{ disabled: page == 1 }">
						<a href="" ng-click="prevPage()">&laquo;</a>
					</li>
					<li ng-class="{ disabled: page == lastPage }">
						<a href="" ng-click="nextPage()">&raquo;</a>
					</li>
				</ul>
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
					<td>@{{ user.email }}</td>
					<td>@{{ user.firstname }}</td>
					<td>@{{ user.lastname }}</td>
					<td>@{{ user.grad_year }}</td>
				</tr>
			</tbody>
		</table>
	</div>
@stop

@section('javascript')
	<script type="text/javascript">
    	var csrf_token = '{{ csrf_token() }}';
    </script>
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.min.js')  }}
    {{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular-sanitize.min.js')  }}
	{{ HTML::script('js/user-list.js') }}
@stop