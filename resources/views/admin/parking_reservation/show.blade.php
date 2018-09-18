@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h2>Customer</h2>
				<p>Name: <strong>{{ $reservation->customer->full_name }}</strong></p>
				<p>Phone: <strong>{{ $reservation->customer->phone }}</strong></p>
				<p>Email: <strong>{{ $reservation->customer->email }}</strong></p>
				<p>City: <strong>{{ $reservation->customer->city }}</strong></p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h2>Payment</h2>
				<p>Price per month: <strong>{{ sprintf('%s $', $reservation->space->price->price) }}</strong></p>
				<p>Amount to pay: <strong>{{ $reservation->amount_to_pay }}</strong></p>
				<p>Status : <strong>{{ $reservation->payment_status }}</strong></p>
			</div>
		</div>
	</div>
</div>
<div class="row mt-2">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h2>Reservation</h2>
				<p>Number of days reserved: <strong>{{ $reservation->total_days }}</strong></p>
				<p>Number of months reserved: <strong>{{ $reservation->total_months }}</strong></p>
				<p>Date of booking start: <strong>{{ $reservation->from }}</strong></p>
				<p>Date of booking ending: <strong>{{ $reservation->to }}</strong></p>

			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h2>Parking space</h2>
				<p>Parking city: <strong>{{ $reservation->space->model()->city }}</strong></p>
				<p>Parking level: <strong>{{ $reservation->space->level }}</strong></p>
				<p>Phone number: <strong>{{ $reservation->space->model()->phone }}</strong></p>
				<p>Phone email: <strong>{{ $reservation->space->model()->email }}</strong></p>
				<p>Phone number: <strong>{{ $reservation->space->model()->full_adress }}</strong></p>
			</div>
		</div>
	</div>
</div>
@endsection
