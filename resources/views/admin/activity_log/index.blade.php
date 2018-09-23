@extends('layouts.admin')

@section('content')
<table class="table table-middle-aligned  table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Action</th>
			<th>Editor</th>
			<th>Changed</th>
			<th>From</th>
			<th>To</th>
			<th>Data and time</th>
		</tr>
	</thead>
	<tbody>
		@foreach($logs as $log)
			@php
				$changes = $log->changes;
				$changes = json_decode($changes, true);
			@endphp
		@for($i = 0; $i < count($changes); $i++)
			<tr>
				<td>{{ $log->full_name }} {{ $log->action }}</td>
				<td>{{ $log->changed_by }}</td>
				<td>{{ str_replace('_', ' ', $changes[$i]['name']) }}</td>
				<td>{{ $changes[$i]['old'] }}</td>
				<td>{{ $changes[$i]['new'] }}</td>
				<td>{{ $log->created_at }}</td>
		@endfor
		@if(empty($changes))
			<td>{{ $log->full_name }} {{ $log->action }}</td>
			<td>{{ $log->changed_by }}</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>{{ $log->created_at }}</td>
		@endif
			</tr>
		@endforeach
	</tbody>
</table>
{{ $logs->render() }}
@endsection
