@extends('layouts.master')

@section('title', 'Edit MOT')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('_heading')

                @include('_messages')

                {!! Form::model($mot, [
                    'method' => 'PATCH',
                    'route' => ['mots.update', $mot->id],
                    'class' => 'form-horizontal',
                ]) !!}

                    @include('mots/_form_fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</section>

@endsection
