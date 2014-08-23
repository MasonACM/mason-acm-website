{{ Form::open(['route' => 'games.store', 'class' => 'form-inline']) }}
    <div class="form-group">
        {{ Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Title']) }}
    </div>
    <div class="form-group">
        {{ Form::text('max_players', null, ['class' => 'form-control input-lg', 'placeholder' => '# Players per team']) }}
    </div>
    <button type="submit" class="btn btn-primary btn-lg">
        Create game
    </button>
{{ Form::close() }}