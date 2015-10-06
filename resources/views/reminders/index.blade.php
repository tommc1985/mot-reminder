@extends('layouts.master')

@section('title', 'Reminders')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="pull-right">
                    <a class="btn btn-xs btn-info" href="{{ route('reminders.create') }}">Add Reminder</a>
                </div>

                @include('_heading')

                @include('_messages')

                @if($reminders)
                    @foreach($reminders as $reminder)
                    <div class="pull-right">
                        <a class="btn btn-xs btn-info" href="{{ route('reminders.edit', $reminder->id) }}">Edit</a>
                    </div>
                    <h5>{{ $reminder->description }}</h5>
                    <hr />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

@endsection