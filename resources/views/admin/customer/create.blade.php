@extends('layouts.admin')

@section('content')
    {{ Form::open(['route' => 'customer.store']) }}
    	<div class="card">
    		<div class="card-body">
		    	@include('admin.customer.components.form')
		    	{{ Form::submit('Create customer', ['class' => 'btn btn-success btn-block']) }}
	    	</div>
	    </div>
	{{ Form::close() }}
@endsection
