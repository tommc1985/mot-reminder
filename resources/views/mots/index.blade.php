@extends('layouts.master')

@section('title', 'MOTs')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="pull-right">
                    <a class="btn btn-xs btn-info" href="{{ route('mots.create') }}">Add MOT</a>
                </div>

                @include('_heading')

                @include('_messages')

                @if($mots)
                    @foreach($mots as $mot)
                    <div class="pull-right">
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['mots.destroy', $mot->id],
                                'class' => 'delete-model',
                                'data-delete-message' => "Are you sure you want to delete {$mot->first_name} {$mot->last_name}'s MOT?"
                            ]) !!}
                                <a class="btn btn-xs btn-info" href="{{ route('mots.edit', $mot->id) }}">Edit</a>
                                {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                            {!! Form::close() !!}
                    </div>
                    <h5>{{ $mot->last_name }}, {{ $mot->first_name }}</h5>
                    <p>Vehicle: {{ $mot->vehicle_make }} ({{ $mot->vehicle_reg }})</p>
                    <hr />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@endsection