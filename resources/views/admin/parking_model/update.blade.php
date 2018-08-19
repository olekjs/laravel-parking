@extends('layouts.admin')

@section('content')
	@include('admin.parking_model.form');
@endsection
<script src="{{ mix('/js/create-model.js') }}"></script>
