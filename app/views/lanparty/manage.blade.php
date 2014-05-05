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
                    {{ Form::input('text', 'date', '', ['class' => 'form-control', 'placeholder' => 'Date', 'id' => 'date']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
	@foreach($lans as $lan)
        <div class="row well">
            <div class="col-md-2">
                <h5>
                    <i class="fa fa-calendar"></i>&nbsp;
                    {{ $lan->present()->longDate() }}
                </h5>
            </div>
            <div class="col-md-2">
                @if($lan->active)
                    <div class="btn btn-sm btn-primary">Make Active</div>
                @else
                    <div class="btn btn-sm btn-danger">Make Inactive</div>
                @endif
            </div>
            <div class="col-md-2">
                {{ $lan->attendeeCount() }} Attendees
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
        })
    </script>
@stop
