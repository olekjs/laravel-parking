@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
        	{{ Form::open(array('route' => 'parking-model-create')) }}
            	<div class="card-body">
		            <div class="row">
						<div class="col-md-6">
							<div class="form-group required">
								{{ Form::label('levels', 'Number of parking levels', ['class' => 'form-label']) }}
								{{ Form::select('levels', $levels, '0', ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-md-6">
							<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_one', 'Number of parking spaces on level 1', ['class' => 'form-label']) }}
		            			{{ Form::text('space_one', 0, ['class' => 'form-control']) }}
		            		</div>
	            			<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_two', 'Number of parking spaces on level 2', ['class' => 'form-label']) }}
		            			{{ Form::text('space_two', 0, ['class' => 'form-control']) }}
	            			</div>
	            			<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_third', 'Number of parking spaces on level 3', ['class' => 'form-label']) }}
		            			{{ Form::text('space_third', 0, ['class' => 'form-control' ]) }}
	            			</div>
	            			<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_four', 'Number of parking spaces on level 4', ['class' => 'form-label']) }}
		            			{{ Form::text('space_four', 0, ['class' => 'form-control' ]) }}
	            			</div>
	            			<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_five', 'Number of parking spaces on level 5', ['class' => 'form-label']) }}
		            			{{ Form::text('space_five', 0, ['class' => 'form-control' ]) }}
	            			</div>
	            			<div class="spaces" data-space='1'> 
		            			{{ Form::label('space_six', 'Number of parking spaces on level 6', ['class' => 'form-label']) }}
		            			{{ Form::text('space_six', 0, ['class' => 'form-control' ]) }}
	            			</div>
	            		</div>
					</div>
					 <div class="row">
						<div class="col-md-3">
							<div class="form-group required">
								{{ Form::label('city', 'Parking city name', ['class' => 'form-label']) }}
								{{ Form::text('city', null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group required">
								{{ Form::label('address_number', 'Parking city address number', ['class' => 'form-label']) }}
								{{ Form::text('address_number', null, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group required">
								{{ Form::label('phone', 'Phone number', ['class' => 'form-label']) }}
								{{ Form::text('phone', null, ['class' => 'form-control']) }}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group required">
								{{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
								{{ Form::text('email', null, ['class' => 'form-control']) }}
							</div>
						</div>
					</div>
	            	<div class="form-group">
	            		{{ Form::submit('Create', ['class' => 'btn btn-success btn-block']) }}
	            	</div>
	            </div>
           	{{ Form::close() }}
        </div>
    </div>
</div>

@endsection
<script src="{{ mix('/js/create-parking-model.js') }}"></script>

