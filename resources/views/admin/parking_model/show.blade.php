@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-6">
		@foreach($model->spaces() as $space)
		<p>Level {{ $space->level }} | Spaces {{ $space->spaces }}</p>
		@endforeach
	</div>
	<div class="col-md-6">
		asd
	</div>
</div>
@endsection
