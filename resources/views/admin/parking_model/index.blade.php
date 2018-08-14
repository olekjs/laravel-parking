@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-6 mx-left">
	    {{ Form::open(array('route' => 'parking-model-create')) }}
	        <div class="card">
            	<div class="card-body">
		            <div class="row">
						<div class="col-md-6">
	{{-- 					<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_one', 'Number of parking spaces on level 1', ['class' => 'form-label']) }}
		            			{{ Form::text('space_one', 0, ['class' => 'form-control']) }}
	            			</div> --}}
	            		</div>
					</div>
					 <div class="row">
						<div class="col-md-5">
							<div class="form-group required">
								{{ Form::label('city', 'Parking city name', ['class' => 'form-label']) }}
								{{ Form::text('city', null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group required">
								{{ Form::label('address_number', 'Parking city address number', ['class' => 'form-label']) }}
								{{ Form::text('address_number', null, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="form-group required">
								{{ Form::label('phone', 'Phone number', ['class' => 'form-label']) }}
								{{ Form::text('phone', null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-md-5">
							<div class="form-group required">
								{{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
								{{ Form::text('email', null, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
	            </div>
       		</div>
	</div>
	<div class="col-md-6 mx-right">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<div class="form-group required">
						<div class="btn btn-primary btn-block level-add">Add parking level</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group level-group row"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="btn btn-warning level-save">test</div>
	{{ Form::submit('Create', ['class' => 'btn btn-success btn-block']) }}
	{{ Form::close() }}
</div>
@endsection
<script src="{{ mix('/js/create-parking-model.js') }}"></script>

