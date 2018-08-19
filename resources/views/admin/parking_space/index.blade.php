@extends('layouts.admin')

@section('content')
<table class="table table-middle-aligned  table-hover">
	<thead class="thead-dark">
	    <tr>
	        <th>Parking city</th>
	        <th>Level</th>
	        <th>Spaces</th>
	        <th>Created at</th>
	        <th></th>
	    </tr>
	</thead>
	<tbody>
		@foreach($spaces as $space)
	        <tr>
	            <td>{{ $space->model()->city }}</td>
  	            <td>{{ $space->level }}</td>
	            <td>{{ $space->spaces }}</td>
	            <td>{{ $space->created_at }}</td>
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

