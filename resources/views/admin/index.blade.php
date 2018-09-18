@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div id="app">
                        <test></test>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                	asd
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ mix('js/test.js') }}"></script>
@endpush
