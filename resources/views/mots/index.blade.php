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
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th class="col-md-3">Customer</th>
                            <th class="col-md-2 text-center">Vehicle</th>
                            <th class="col-md-1 text-center">Reg No</th>
                            <th class="col-md-2 text-center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mots as $mot)
                        <tr>
                            <td>{{ $mot->first_name }} {{ $mot->last_name }}</td>
                            <td class="text-center">{{ $mot->vehicle_make }}</td>
                            <td class="text-center">{{ $mot->vehicle_reg }}</td>
                            <td class="text-center">
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['mots.destroy', $mot->id],
                                    'class' => 'delete-model',
                                    'data-delete-message' => "Are you sure you want to delete {$mot->first_name} {$mot->last_name}'s MOT?"
                                ]) !!}
                                    <a class="btn btn-xs btn-info" href="{{ route('mots.edit', $mot->id) }}">Edit</a>
                                    {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                                {!! Form::close() !!}
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