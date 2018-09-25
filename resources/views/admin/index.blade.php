@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>Active reservations: {{ $activeReservations }}</p>
                    <p>Monthly earnings: {{ $earnings }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="spaceStatistic" width="400" height="400" data-parkingProperties='{"reservations": ["{{ $reservations['today'] }}", "{{ $reservations['yesterday'] }}", "{{ $reservations['beforeYesterday'] }}"] , "dates": ["{{ $dates['today'] }}", "{{ $dates['yesterday'] }}", "{{ $dates['beforeYesterday'] }}"]}'></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <canvas id="earningStatistic" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/charts.js') }}"></script>
