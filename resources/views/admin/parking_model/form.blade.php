<div class="row">
	<div class="col-md-6 mx-left">
	    {{ Form::open(array('route' => 'parking-model-create')) }}
	    {{ Form::hidden('level_id', uniqid()) }}
	    {{ Form::hidden('level_val', null) }}
	    {{ Form::hidden('level_total', null) }}
	    {{ Form::hidden('spaces_total', null) }}
	    <div class="card">
	    	<div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<div class="form-group required">
							{{ Form::label('city', 'Parking city name', ['class' => 'form-label']) }}
							{{ Form::text('city', null, ['class' => 'form-control', 'required' => true]) }}
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group required">
							{{ Form::label('address_number', 'Parking city address number', ['class' => 'form-label']) }}
							{{ Form::text('address_number', null, ['class' => 'form-control', 'required' => true]) }}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="form-group required">
							{{ Form::label('phone', 'Phone number', ['class' => 'form-label']) }}
							{{ Form::text('phone', null, ['class' => 'form-control', 'required' => true]) }}
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group required">
							{{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
							{{ Form::text('email', null, ['class' => 'form-control', 'required' => true]) }}
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
	{{ Form::submit('Create', ['class' => 'btn btn-success btn-block level-save']) }}
	{{ Form::close() }}
</div>

