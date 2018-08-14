@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin') }}" class="btn btn-primary">Admin panel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
