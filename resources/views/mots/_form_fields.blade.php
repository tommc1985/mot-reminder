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
    {!! Form::label('vehicle_make', 'Vehicle Make/Model', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('vehicle_make', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('vehicle_reg', 'Car Reg No', array('class' => 'col-sm-4 col-md-4 control-label')) !!}
    <div class="col-sm-6 col-md-6">
        {!! Form::text('vehicle_reg', null, array('class' => 'form-control')) !!}
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
    <div class="col-sm-4 col-md-4">
        <div class="row">
            {!! Form::label('messages', 'Messages', array('class' => 'col-sm-12 col-md-12 control-label')) !!}
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        @if($messages)
            @foreach ($messages as $message)
                <label>{!! Form::checkbox('messages[]', $message->id, in_array($message->id, $reminders)) !!} {!! $message->description !!}</label><br />
            @endforeach
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-md-6 col-sm-offset-4 col-md-offset-4">
        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
    </div>
</div>