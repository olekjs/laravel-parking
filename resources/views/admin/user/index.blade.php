@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	@foreach($users as $user)

                	<p>{{ $user->name }}</p>

                	@endforeach
                </div>
            </div>
             {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
