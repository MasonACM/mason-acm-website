@extends('layouts.master')

@section('title', 'ACM Members')

@section('content')
	<div class="container spacing-top">
		<table class="table">
			<thead>
				<td>Email</td>
				<td>Firstname</td>
				<td>Lastname</td>
				<td>Graduation Year</td>
			</thead>
			<tbody>
				@foreach ($members as $member)
					<tr>
						<td>{{ $member->email }}</td>
						<td>{{ $member->firstname }}</td>
						<td>{{ $member->lastname }}</td>
						<td>{{ $member->grad_year }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop