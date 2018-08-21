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
	        <th></th>
	        <th></th>
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
	            <td>
	                <a href="#" class="btn btn-secondary btn-sm" title="Edytuj">
	                    <span class="glyphicon glyphicon-edit"></span>Edytuj
	                </a>
	            </td>
	            <td>
	                <a href="#" class="btn btn-danger btn-sm" title="Usuń">
	                    <span class="glyphicon glyphicon-edit"></span>Usuń
	                </a>
	            </td>
	        </tr>
	    @endforeach
	</tbody>
</table>
<a class="btn btn-primary btn-block" href="{{ route('parking-model-create-view') }}">Add new parking</a>
@endsection