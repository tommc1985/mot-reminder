@extends('layouts.admin')

@section('title', 'Create Player')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('admin/_heading')

                @include('admin/_messages')

                {!! Form::open([
                    'route' => 'admin.players.index',
                    'class' => 'form-horizontal'
                ]) !!}

                    @include('admin/player/_form_fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</section>

@endsection