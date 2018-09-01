@extends('layouts.admin')

@section('content')
	{{ Form::model($price, ['route' => ['price.update', $model, $space, $price]]) }}
    	<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							{{ Form::label('price', 'Set the price per month for this level', ['class' => 'form-label']) }}
							{{ Form::text('price', null, ['class' => 'form-control', 'required']) }}
						</div>
					</div>
				</div>
	    		{{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}
    		</div>
	    </div>
	{{ Form::close() }}
</table>
@endsection
