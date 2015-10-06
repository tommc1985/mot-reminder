<div class="form-group">
    {!! Form::label('description', 'Description', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('description', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('type', 'Type', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::select('type', array(null => '--- Select ---') + App\Message::types(), null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('message', 'Message', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::textarea('message', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('delay_before', 'Delay Before', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::number('delay_before', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('delay_after', 'Delay After', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::number('delay_after', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('enabled', 'Enabled', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::checkbox('enabled', 1, null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-md-6 col-sm-offset-4 col-md-offset-4">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>
</div>