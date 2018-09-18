@extends('layouts.admin')

@section('content')
	    {{ Form::open(['route' => 'parking-model-create-store']) }}
	    	@include('admin.parking_model.components.form')
		{{ Form::close() }}
@endsection
<script src="{{ mix('/js/create-parking-model.js') }}"></script>
