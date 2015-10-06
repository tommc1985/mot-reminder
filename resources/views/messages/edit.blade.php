@extends('layouts.master')

@section('title', 'Edit Message')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('_heading')

                @include('_messages')

                {!! Form::model($message, [
                    'method' => 'PATCH',
                    'route' => ['messages.update', $message->id],
                    'class' => 'form-horizontal',
                ]) !!}

                    @include('messages/_form_fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</section>

@endsection
