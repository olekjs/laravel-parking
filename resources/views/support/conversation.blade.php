@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card scrollable">
		    	<div class="card-body">
			    	@foreach($messages as $message)
			    		@if($message->from == 'admin')
			    			<p class="float-left cloud-blue">{{ $message->message }}</p>
			    		@else
			    			<p class="float-right cloud-green">{{ $message->message }}</p>
			    		@endif
			    	@endforeach
		    	</div>
			</div>
			{{ Form::open(['route' => ['support.send', $conversation_id]]) }}
			<div class="input-group mb-3">
				{{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => '2']) }}
				<div class="input-group-append">
			    	{{ Form::submit('Send', ['class' => 'btn btn-success']) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection
