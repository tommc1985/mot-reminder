@extends('layouts.master')

@section('title', 'Add MOT')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('_heading')

                @include('_messages')

                {!! Form::open([
                    'route' => 'mots.index',
                    'class' => 'form-horizontal'
                ]) !!}

                    @include('mots/_form_fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</section>

@endsection