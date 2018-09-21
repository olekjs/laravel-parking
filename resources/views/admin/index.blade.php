@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Active reservations: {{ $activeReservations }}</p>
                    <p>Today's earnings: {{ $earnings }}</p>
                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                	asd
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
