@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-body">
		{{ Form::open(['route' => ['support.store']]) }}
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('title', 'Title', ['class' => 'form-label']) }}
						{{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('category', 'Category', ['class' => 'form-label']) }}
						{{ Form::select('category',
							[
								'Payment' 	=> 'Payment',
								'Technical' => 'Technical',
								'Other' 	=> 'Other',
							],
							null,
						 	['class' => 'form-control', 'required']) }}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
						{{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
					</div>
				</div>
			</div>
		{{ Form::submit('Create', ['class' => 'btn btn-success']) }}
		{{ Form::close() }}
	</div>
</div> 
@endsection
