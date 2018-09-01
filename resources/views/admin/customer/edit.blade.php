@extends('layouts.admin')

@section('content')
	{{ Form::model($customer, ['route' => ['customer.update', $customer]]) }}
    	<div class="card">
    		<div class="card-body">
		    	@include('admin.customer.components.form')
		    	{{ Form::submit('Update customer', ['class' => 'btn btn-success btn-block']) }}
	    	</div>
	    </div>
	{{ Form::close() }}
@endsection
