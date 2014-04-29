@extends('layouts.masterWithTitle')

@section('title', 'Users')

@section('content')
	<table class="table" id="roster">
		<thead>
			<tr class="header-white">
				<th> ID </th>
				<th> Name </th>
				<th> Email</th>
				<th> Grad year </th>
				<th> Role </th>
				<th> Account Age </th>
				<th> Delete </th>
				<th> Edit Role </th>
			</tr>
		</thead>
		
		<tbody>
			@foreach($users as $user) 
				<tr>
					<td class='user-id'>   {{ $user->id    }}
					<td class='user-fn'>   {{ $user->present()->fullName() }} </td>
					<td class='user-em'>   {{ $user->email }} </td>
					<td class='user-gr'>   {{ $user->grad_year }} </td>
					<td class='user-role'> {{ $user->role  }} </td>
					<td class='user-age'>  {{ $user->present()->accountAge() }} </td>
					
					@if($user->role < 2)
						<td> 					
							{{ Form::open(['method' => 'POST', 'url' => 'users/remove', 'class' => 'delete-form']) }} 
								<input type="hidden" name="id" value="{{ $user->id }}"/>
								<input type='submit' value='Delete' class="btn btn-danger btn-delete"></input>
							{{ Form::close() }}						
						</td>
						<td>
							{{ Form::open(['method' => 'POST', 'url' => 'users/editrole']) }}
								@if($user->role == 1) 
									<input type="hidden" name="role" value="0" class="btn"/>
								@else 
									<input type="hidden" name="role" value="1" class="btn"/>
								@endif

								<input type="hidden" name="id" value="{{ $user->id }}"/>
							    <input type='submit' value='Edit Role' class="btn btn-primary"/>
							{{ Form::close() }}					
						</td>	
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@stop