@extends('layouts.admin')

@section('content')
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
	        <th class="text-right"></th>
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
	            <td class="text-right">
	                <a href="{{ route('parking-model-show', $parking) }}" class="btn btn-info btn-sm" title="Edytuj">
	                    <span class="glyphicon glyphicon-edit"></span> Show
	                </a>
	                <a href="{{ route('parking-model-edit-view', $parking) }}" class="btn btn-secondary btn-sm" title="Edytuj">
	                    <span class="glyphicon glyphicon-edit"></span> Edit
	                </a>
	                <a href="{{ route('parking-model-destroy', $parking) }}" class="btn btn-danger btn-sm" title="Usuń">
	                    <span class="glyphicon glyphicon-edit"></span> Delete
	                </a>
	            </td>
	        </tr>
	    @endforeach
	</tbody>
</table>
<a class="btn btn-primary btn-block" href="{{ route('parking-model-create-view') }}">Add new parking</a>
@endsection