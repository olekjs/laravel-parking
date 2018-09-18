@extends('layouts.admin')

@section('content')
@if($parkings->isEmpty())
	<div class="card">
		<div class="card-body text-center">
			<h3>No parking has been created</h3>
			<a class="btn btn-primary mt-4" href="{{ route('parking-model-create-view') }}">Create parking model</a>
		</div>
	</div>
@else
<table class="table table-middle-aligned  table-hover">
	<thead class="thead-dark">
	    <tr>
	        <th>Parking city</th>
	        <th>Address number</th>
	        <th>Phone</th>
	        <th>Email</th>
	        <th>Levels</th>
	        <th>Spaces</th>
	        <th>Created at</th>
	        <th class="text-right"><a class="btn btn-primary" href="{{ route('parking-model-create-view') }}">Add new parking</a></th>
	    </tr>
	</thead>
	<tbody>
		@foreach($parkings as $parking)
	        <tr>
	            <td>{{ $parking->city }}</td>
	            <td>{{ $parking->address_number }}</td>
	            <td>{{ $parking->phone }}</td>
	            <td>{{ $parking->email }}</td>
	            <td>{{ $parking->level_total }}</td>
	            <td>{{ $parking->spaces_total }}</td>
	            <td>{{ $parking->created_at }}</td>
	            <td class="list-inline text-right">
	                <a href="{{ route('parking-model-show', $parking) }}" class="btn btn-info btn-sm list-inline-item" title="Manage"> Manage</a>
	                <a href="{{ route('parking-model-edit-view', $parking) }}" class="btn btn-secondary btn-sm list-inline-item" title="Edit"> Edit</a>
                    {{ Form::open(['route' => ['parking-model-destroy', $parking], 'method' => 'DELETE', 'class' => 'list-inline-item']) }}
                    	<button type="submit" class="btn btn-default btn-sm" title="Delete"> Delete</button>
                	{{ Form::close() }}
	            </td>
	        </tr>
	    @endforeach
	</tbody>
</table>
@endif
@endsection