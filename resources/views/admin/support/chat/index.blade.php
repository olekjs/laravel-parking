@extends('layouts.admin')

@section('content')
@if($conversations->isEmpty())
	<div class="card">
		<div class="card-body text-center">
			<h3>No tickets has been created</h3>
		</div>
	</div>
@else
	<table class="table table-middle-aligned">
		<thead class="thead-dark">
		    <tr>
		        <th>Ticket id</th>
		        <th>Title</th>
		        <th>Email sender</th>
		        <th>Category</th>
		        <th>Status</th>
		        <th>Created at</th>
		        <th class="text-right"></th>
		    </tr>
		</thead>
		@foreach($conversations as $conversation)
			<tbody>
				<td>{{ $conversation->conversation_id }}</td>
				<td>{{ $conversation->title }}</td>
				<td>{{ $conversation->email }}</td>
				<td>{{ $conversation->category }}</td>
				<td>{{ $conversation->status }}</td>
				<td>{{ $conversation->created_at }}</td>
				<td class="text-right">
					<a href="{{ route('conversation.index', $conversation ) }}" class="btn btn-secondary">Show</a>
					<a href="{{ route('conversation.index', $conversation ) }}" class="btn btn-secondary">Close ticket</a>
				</td>
			</tbody>
		@endforeach
	</table>
@endif
@endsection
