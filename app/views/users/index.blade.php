@extends('layouts.master')

@section('content')
	<div class="jumbotron">
		<div class="container">
			<h1><i class="fa fa-users"></i> Users</h1>	
		</div>
	</div>
	<div class="container">
		<table class="table">
			<thead>
				<td>Email</td>
				<td>Firstname</td>
				<td>Lastname</td>
				<td>Graduation Year </td>
				<td>Role</td>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->email }}</td>
						<td>{{ $user->firstname }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->grad_year }}</td>
						<td>
							<a href="#" class="btn btn-link"{{ ! $user->isAdmin() ?: 'disabled' }}>
								<i class="fa fa-plus"></i> Make Admin
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $users->appends(['count' => $count])->links() }}
	</div>
@stop