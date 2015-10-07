@extends('layouts.master')

@section('title', 'Messages')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <div class="pull-right">
                    <a class="btn btn-xs btn-info" href="{{ route('messages.create') }}">Add Message</a>
                </div>

                @include('_heading')

                @include('_messages')

                @if($messages)
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th class="col-md-4">Description</th>
                            <th class="col-md-2 text-center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->description }}</td>
                            <td class="text-center">
                                <a class="btn btn-xs btn-info" href="{{ route('messages.edit', $message->id) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection