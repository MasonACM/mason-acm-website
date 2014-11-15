@extends('layouts.master')

@section('content')
  <div class="container">
    {{ Form::model($competition, ['route' => ['competitions.update', $competition->id], 'class' => 'well']) }}
      <div class="form-group">
        {{ Form::text('game_title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Game title']) }}
      </div>
      <button type="submit" class="btn btn-primary btn-lg">
        Update competition
      </button>
    {{ Form::close() }}
  </div>
@stop