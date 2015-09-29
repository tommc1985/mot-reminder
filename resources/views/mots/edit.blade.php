@extends('layouts.admin')

@section('title', 'Edit Player')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('admin/_heading')

                @include('admin/_messages')

                {!! Form::model($player, [
                    'method' => 'PATCH',
                    'route' => ['admin.players.update', $player->id],
                    'class' => 'form-horizontal',
                ]) !!}

                    @include('admin/player/_form_fields')

                {!! Form::close() !!}

            </div>
        </div>
    </div>

</section>

@endsection
