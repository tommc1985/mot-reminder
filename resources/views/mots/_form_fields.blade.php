<div class="form-group">
    {!! Form::label('first_name', 'First Name', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('first_name', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('last_name', 'Last Name', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('last_name', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <label class="col-sm-4 col-md-4 control-label">Image</label>
    <div class="col-sm-6 col-md-6">
        {!! Form::select('image_id', array(null => '--- Select ---') + App\Image::orderBy('alt', 'asc')->lists('alt', 'id'), null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::email('email', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('handicap', 'Handicap', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::input('number', 'handicap', null, array('class' => 'form-control', 'min' => 0, 'max' => 36)) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-md-6 col-sm-offset-4 col-md-offset-4">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>
</div>