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
    {!! Form::label('phone_number', 'Phone Number', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('phone_number', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::email('email', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('car_make', 'Car Make/Model', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('car_make', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('reg_no', 'Car Reg No', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('reg_no', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('mot_date', 'MOT Date', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::date('mot_date', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('comments', 'Other comments', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::textarea('comments', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-md-6 col-sm-offset-4 col-md-offset-4">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>
</div>