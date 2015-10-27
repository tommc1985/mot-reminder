@extends('layouts.master')

@section('title', 'View MOT')

@section('content')

<section class="fullwidth">

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">

                <h1>View MOT</h1>
                <h2>Details</h2>

                <dl class="dl-horizontal">
                    <dt>Name</dt>
                    <dd>{{ $mot->last_name }}, {{ $mot->first_name }}</dd>
                    <dt>Phone Number</dt>
                    <dd><a href="tel:{{ $mot->phone_number }}">{{ $mot->phone_number }}</a></dd>
                    <dt>Email Address</dt>
                    <dd><a href="mailto:{{ $mot->email }}">{{ $mot->email }}</a></dd>
                    <dt>Vehicle Make/Model</dt>
                    <dd>{{ $mot->vehicle_make }}</dd>
                    <dt>Vehicle Reg</dt>
                    <dd>{{ $mot->vehicle_reg }}</dd>
                    <dt>MOT Completed</dt>
                    <dd>{{ date('D jS F Y', strtotime($mot->mot_date)) }}</dd>
                    <dt>MOT Expires</dt>
                    @if($mot->expiry_date)
                    <dd>{{ date('D jS F Y', strtotime($mot->expiry_date)) }}</dd>
                    @else
                    <dd>Unknown</dd>
                    @endif
                    <dt>Comments</dt>
                    @if($mot->comments)
                    <dd>{{ $mot->comments }}</dd>
                    @else
                    <dd>None</dd>
                    @endif
                </dl>

                <h2>Reminders</h2>

                @if ($reminders)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reminders as $reminder)
                        <tr>
                            <td>{{ $reminder->message->description }}</td>
                            @if ($reminder->sent_date)
                            <td>Sent ({{ date('d/m/y, H:i', strtotime($reminder->sent_date)) }})</td>
                            @else
                            <td>Pending</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No reminders set up for this MOT.</p>
                @endif

            </div>
        </div>
    </div>

</section>

@endsection
