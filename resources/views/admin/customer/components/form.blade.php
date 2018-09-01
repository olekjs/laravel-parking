<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('first_name', 'First name', ['class' => 'form-label']) }}
			{{ Form::text('first_name', null, ['class' => 'form-control', 'required']) }}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{{ Form::label('last_name', 'Last name', ['class' => 'form-label']) }}
			{{ Form::text('last_name', null, ['class' => 'form-control', 'required']) }}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('phone', 'Phone number', ['class' => 'form-label']) }}
			{{ Form::text('phone', null, ['class' => 'form-control', 'required']) }}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('email', 'Email', ['class' => 'form-label']) }}
			{{ Form::text('email', null, ['class' => 'form-control', 'required']) }}
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('city', 'City', ['class' => 'form-label']) }}
			{{ Form::text('city', null, ['class' => 'form-control', 'required']) }}
		</div>
	</div>
</div>


