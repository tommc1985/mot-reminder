@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<section class="fullwidth grid dashboard">
    <div class="container">

        <div class="panel-intro">
            <h1>Dashboard</h1>
        </div>

    </div>
</section>

<section class="fullwidth">
    <div class="container">

        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <h2>MOTs Expiring soon</h2>
                @if ($motExpiringNext30Days)
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Vehicle Make</th>
                            <th>Expiry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motExpiringNext30Days as $mot)
                        <tr>
                            <td><a href="{{ route('mots.show', $mot->id) }}">{{ $mot->first_name . ' ' . $mot->last_name }}</a></td>
                            <td><a href="{{ route('mots.show', $mot->id) }}">{{ $mot->vehicle_make }}</a></td>
                            <td><a href="{{ route('mots.show', $mot->id) }}">{{ date('D jS F', strtotime($mot->expiry_date)) }}</a></td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
                @else
                <p>There aren't any MOTs that expire soon.</p>
                @endif
            </div>
            <div class="col-sm-4 col-xs-12">
                <h2>Stats</h2>
                <h3>MOTs</h3>

                <dl>
                    <dt>MOTs in system</dt>
                    <dd>{{ $motCount }}</dd>
                    <dt>MOTs that will expire</dt>
                    <dd>{{ $motExpiringCount }}</dd>
                </dl>

                <h3>Reminders</h3>

                <h4>Email + SMS</h4>
                <dl>
                    <dt>Reminders Sent</dt>
                    <dd>{{ $sentReminderCount }}</dd>
                </dl>

                <h4>Email</h4>
                <dl>
                    <dt>Reminders Sent (Last 7 days)</dt>
                    <dd>{{ $sentEmailRemindersLast7DaysCount }}</dd>
                    <dt>Reminders Sent (Last 30 Days)</dt>
                    <dd>{{ $sentEmailRemindersLast30DaysCount }}</dd>
                    <dt>Reminders Sent (Total)</dt>
                    <dd>{{ $sentEmailReminderCount }}</dd>
                </dl>

                <h4>SMS</h4>
                <dl>
                    <dt>Reminders Sent (Last 7 days)</dt>
                    <dd>{{ $sentSmsRemindersLast7DaysCount }}</dd>
                    <dt>Reminders Sent (Last 30 Days)</dt>
                    <dd>{{ $sentSmsRemindersLast30DaysCount }}</dd>
                    <dt>Reminders Sent (Total)</dt>
                    <dd>{{ $sentSmsReminderCount }}</dd>
                </dl>
            </div>
        </div>

    </div>
</section>

@endsection