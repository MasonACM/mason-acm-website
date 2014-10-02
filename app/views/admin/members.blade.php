@extends('layouts.master')

@section('title', 'ACM Members')

@section('content')
	<div class="container spacing-top">
		<table class="table">
			<thead>
				<td>#</td>
				<td>Email</td>
				<td>Firstname</td>
				<td>Lastname</td>
				<td>Graduation Year</td>
			</thead>
			<tbody>
				@foreach ($members as $index => $member)
					<tr>
						<td>{{ $index + 1 }}</td>
						<td>{{ $member->email }}</td>
						<td>{{ ucwords($member->firstname) }}</td>
						<td>{{ ucwords($member->lastname) }}</td>
						<td>{{ $member->grad_year }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop