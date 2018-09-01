@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<table class="table table-middle-aligned  table-hover">
			<thead class="thead-dark">
			    <tr>
			        <th>Level</th>
			        <th class="text-center">Spaces</th>
			        <th class="text-center">Price (per month)</th>
			        <th class="text-center">Free spaces</th>
			        <th class="text-center">Reserved spaces</th>
			        <th class="text-right"></th>
			    </tr>
			</thead>
			<tbody>
			@foreach($model->spaces() as $space)
			        <tr>
			            <td>{{ $space->level }}</td>
			            <td class="text-center">{{ $space->spaces }}</td>
			            <td class="text-center">{{ $space->price['price'] > 0 ? $space->price['price'] : '0' }}</td>
			            <td class="text-center">{{ $space->spaces - $space->price['reservations'] }}</td>
			            <td class="text-center">{{ $space->price['reservations'] > 0 ? $space->price['reservations'] : '0' }}</td>
			            <td class="text-right">
			            	@if(empty($space->price['price']))
				            	<a href="{{ route('price.index', [$model, $space]) }}" class="btn btn-info btn-sm" title="Manage Price">
				                    <span class="glyphicon glyphicon-edit"></span> Set level price
				                </a>
				            @else
				            	<a href="{{ route('price.edit', [$model, $space, $space->price]) }}" class="btn btn-info btn-sm" title="Manage Price">
				                    <span class="glyphicon glyphicon-edit"></span> Edit level price
				                </a>
			            	@endif
			            	@if(!empty($space->price['price']))
				                <a href="{{ route('reservation.index', [$model, $space]) }}" class="btn btn-info btn-sm" title="Manage Price">
				                    <span class="glyphicon glyphicon-edit"></span> Add reservation
				                </a>
			                @endif
			            </td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
