@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<table class="table table-middle-aligned  table-hover">
			<thead class="thead-dark">
			    <tr class="text-center">
			        <th>Level</th>
			        <th>Spaces</th>
			        <th>Price $ (per month)</th>
			        <th>Free spaces</th>
			        <th>Reserved spaces</th>
			        <th class="text-right"></th>
			    </tr>
			</thead>
			<tbody>
			@foreach($model->spaces() as $space)
			        <tr class="text-center">
			            <td>{{ $space->level }}</td>
			            <td>{{ $space->spaces }}</td>
			            <td>{{ $space->price['price'] > 0 ? $space->price['price'] . '$': '0' }}</td>
			            <td>{{ $space->spaces - $space->reservations }}</td>
			            <td>{{ $space->reservations }}</td>
			            <td class="text-right">
			            	@if(empty($space->price['price']))
				            	<a href="{{ route('price.index', [$model, $space]) }}" class="btn btn-info btn-sm" title="Set level price"> Set level price
				                </a>
				            @else
				            	<a href="{{ route('price.edit', [$model, $space, $space->price]) }}" class="btn btn-info btn-sm" title="Edit level price"> Edit level price
				                </a>
			            	@endif
			            	@if(!empty($space->price['price']))
				                <a href="{{ route('reservation.create', [$model, $space]) }}" class="btn btn-info btn-sm" title="Add reservation"> Add reservation
				                </a>
			                @else
				                <a href="" class="btn btn-danger btn-sm" title="To add reservations, you first need to set the price level"> Add reservation</a>
			                @endif
			            </td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
</div>
@if($model->reservations->isNotEmpty())
	@include('admin.parking_model.components.reservations', $model)
@endif
@endsection
