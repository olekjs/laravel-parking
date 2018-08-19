@extends('layouts.admin')

@section('content')
<a href="{{ route('parking-model-create-view') }}">dodaj</a>
<table class="table table-middle-aligned  table-hover">
	<thead class="thead-dark">
	    <tr>
	        <th>Parking city</th>
	        <th>Address number</th>
	        <th>Phone</th>
	        <th>Email</th>
	        <th>Created at</th>
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
	            <td>{{ $parking->created_at }}</td>
	            <td>
	                <a href="#" class="btn btn-secondary btn-sm" title="Edytuj">
	                    <span class="glyphicon glyphicon-edit"></span>Edytuj
	                </a>
	            </td>
	        </tr>
	    @endforeach
	</tbody>
</table>
@endsection