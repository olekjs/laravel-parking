@extends('layouts.admin')

@section('content')
	{{ Form::open(['route' => ['reservation.store', $model, $space]]) }}
    	<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('end_reservation_date', 'Date until when booking', ['class' => 'form-label']) }}
							{{ Form::date('end_reservation_date', null, ['class' => 'form-control', 'required', 'min' => 'today']) }}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							{{ Form::label('customer_id', 'Select customer', ['class' => 'form-label']) }}
							{{ Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required']) }}
						</div>
					</div>
				</div>
	    		{{ Form::submit('Create reservation', ['class' => 'btn btn-success btn-block']) }}
    		</div>
	    </div>
	{{ Form::close() }}
</table>
@endsection
