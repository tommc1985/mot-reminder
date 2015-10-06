@extends('layouts.master')

@section('title', 'Add Reminder')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('_heading')

                @include('_messages')

                {!! Form::model($reminder, [
                    'route' => 'reminders.index',
                    'class' => 'form-horizontal',
                ]) !!}

                    @include('reminders/_form_fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</section>

@endsection