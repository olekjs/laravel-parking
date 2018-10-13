@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
    	<a href="{{ route('support.conversation') }}" class="btn btn-primary">Create a new ticket</a>
    </div>
</div>
@endsection
