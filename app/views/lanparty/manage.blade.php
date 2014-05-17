@extends('layouts.masterWithTitle')

@section('title')
	Manage LAN Parties
@stop

@section('content')
    <div class="row well">
        <div class="col-md-3">
            {{ Form::open(['route' => 'lanparty.store', 'class' => 'form-inline']) }}
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Add</button>
                </div>
                <div class="form-group pull-right">
                    {{ Form::input('text', 'date', '', ['class' => 'form-control date', 'placeholder' => 'Date', 'id' => 'date']) }}
                </div>
                <input type="hidden" name="active" value="false">
            {{ Form::close() }}
        </div>
    </div>
	@foreach($lans as $lan)
        <div class="row well">
            <div class="col-md-3">
                {{ Form::model($lan, ['route' => ['lanparty.update', $lan->id], 'class' => 'form-inline']) }}
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    <div class="form-group pull-right">
                        {{ Form::text('date', $lan->present()->quickDate(), ['class' => 'form-control', 'id' => 'date' . $lan->id]) }}
                    </div>
                {{ Form::close() }}
            </div>
            <div class="col-md-2">
                <h5>
                    <i class="fa fa-calendar"></i>&nbsp;
                    {{ $lan->present()->longDate() }}
                </h5>
            </div>
            <div class="col-md-2">
                @if($lan->active)
                    {{ link_to_route('lanparty.deactivate', 'Make Inactive', $lan->id, ['class' => 'btn btn-danger']) }}
                @else
                    {{ link_to_route('lanparty.activate', 'Make Active', $lan->id, ['class' => 'btn btn-primary']) }}
                @endif
            </div>
            <div class="col-md-2">
                {{ $lan->attendeeCount() }} Attendees
            </div>
            <div class="col-md-1">
                {{ HTML::linkWithIcon('lanparty/' . $lan->id . '/roster', 'Roster', 'list-alt', ['class' => 'btn btn-link']) }}
            </div>
            <div class="col-md-2">
                {{ Form::delete('lanparty/' . $lan->id . '/destroy') }}
            </div> 
        </div>
	@endforeach
@stop

@section('css')
    {{ HTML::style('css/datepicker.css') }}
@stop

@section('javascript')
    {{ HTML::script('js/datepicker.min.js') }}
    <script type="application/javascript">
        $(function() {
            $('#date').datepicker();
        });
    </script>
@stop
