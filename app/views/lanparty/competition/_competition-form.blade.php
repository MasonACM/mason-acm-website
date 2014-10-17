{{ Form::open(['route' => 'competitions.store', 'class' => 'form-inline']) }}
    <div class="form-group">
        {{ Form::text('game_title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Game title']) }}
    </div>
    <div class="form-group">
        {{ Form::text('max_players', null, ['class' => 'form-control input-lg', 'placeholder' => '# Players per team']) }}
    </div>
    <button type="submit" class="btn btn-primary btn-lg">
        Create competition
    </button>
{{ Form::close() }}