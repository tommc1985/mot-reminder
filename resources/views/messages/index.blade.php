@extends('layouts.master')

@section('title', 'Messages')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="pull-right">
                    <a class="btn btn-xs btn-info" href="{{ route('messages.create') }}">Add Message</a>
                </div>

                @include('_heading')

                @include('_messages')

                @if($messages)
                    @foreach($messages as $message)
                    <div class="pull-right">
                        <a class="btn btn-xs btn-info" href="{{ route('messages.edit', $message->id) }}">Edit</a>
                    </div>
                    <h5>{{ $message->description }}</h5>
                    <hr />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@endsection