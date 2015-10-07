<div class="col-md-12 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
    {!! Form::open([
        'method'=> 'GET',
        'route' => 'mots.search',
        'class' => '',
    ]) !!}
    <div class="input-group input-group-sm">
        <input type="text" class="form-control" name="s" placeholder="Search for..." value="{!! isset($s) ? $s : '' !!}">
        <span class="input-group-btn">
            <input type="submit" class="btn btn-default" value="Search" />
            <a href="{{ route('mots.index') }}" class="btn btn-default">Reset</a>
        </span>
    </div><!-- /input-group -->
    {!! Form::close() !!}
</div>
