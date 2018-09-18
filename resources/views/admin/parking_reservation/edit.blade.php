@extends('layouts.admin')

@section('content')
	{{ Form::model($reservation, ['route' => ['reservation.update', $reservation]]) }}
    	<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							{{ Form::label('from', 'Date of the beginning of the reservation', ['class' => 'form-label']) }}
							{{ Form::date('from', null, ['class' => 'form-control', 'required', 'min' => 'today']) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{{ Form::label('to', 'End of reservation date', ['class' => 'form-label']) }}
							{{ Form::date('to', null, ['class' => 'form-control', 'required', 'min' => 'today']) }}
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							{{ Form::label('customer_id', 'Select customer', ['class' => 'form-label']) }}
							{{ Form::select('customer_id', $customers, null, ['class' => 'form-control', 'required']) }}
						</div>
					</div>
				</div>
	    		{{ Form::submit('Update reservation', ['class' => 'btn btn-success btn-block']) }}
    		</div>
	    </div>
	{{ Form::close() }}
</table>
@endsection
