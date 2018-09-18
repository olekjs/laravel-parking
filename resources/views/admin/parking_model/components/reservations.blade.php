<div class="row mt-5">
	<div class="col-md-12">
		<h2>Reservations</h2>
		@foreach($model->reservations as $reservation)
			<div class="card mt-2">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<p>Customer: <strong>{{ $reservation->customer->full_name }}</strong></p>
							<p>Date of booking start: <strong>{{ $reservation->from }}</strong></p>
							<p>Date of booking ending: <strong>{{ $reservation->to }}</strong></p>
						</div>
						<div class="col-md-6">
							<p>Amount to pay: <strong>{{ $reservation->amount_to_pay }}</strong></p>
							<p>Payment status : <strong>{{ $reservation->payment_status }}</strong></p>
							<p>Number of days reserved: <strong>{{ $reservation->total_days }}</strong></p>
						</div>
					</div>
					<div>
						<a href="{{ route('reservation.show', $reservation) }}" class="btn btn-info" title="Show"> Show</a>
						<a href="{{ route('reservation.edit', $reservation) }}" class="btn btn-secondary" title="Edit"> Edit</a>
						 {{ Form::open(['route' => ['reservation.destroy', $reservation], 'method' => 'DELETE', 'class' => 'list-inline-item']) }}
	                    	<button type="submit" class="btn btn-default" title="Delete"> Delete</button>
	                	{{ Form::close() }}
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>