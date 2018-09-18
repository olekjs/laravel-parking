@extends('layouts.admin')

@section('content')
	{{ Form::model($model, ['route' => ['parking-model-edit']]) }}
		@include('admin.parking_model.components.form');
	{{ Form::close() }}
@endsection
<script src="{{ mix('/js/create-parking-model.js') }}"></script>
