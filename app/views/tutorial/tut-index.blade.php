@extends('layouts.masterWithTitleAndIcon')

@section('icon')
    <i class="fa fa-file-text"></i>
@stop

@section('title')
	Tutorials
@stop

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			@foreach(TutorialTopic::all() as $tt)
				<br><br>
				{{ HTML::linkWithIcon('tutorials/' . $tt->name, $tt->name, 'ai', $tt->icon, ['class' => 'btn btn-inverse btn-lg', 'style'=>'font-size: 30px !important;']) }}
			@endforeach
			
			<br><br><br>
			{{ HTML::link('tutorials/create', 'Create Tutorial', ['class' => 'btn btn-primary btn-lg']) }}

		</div>
	</div>
@stop