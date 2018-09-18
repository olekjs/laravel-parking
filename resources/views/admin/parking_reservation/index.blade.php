@extends('layouts.admin')

@section('content')
<div id="app">
    <reservation></reservation>
</div>
</table>
@endsection
@push('scripts')
<script src="{{ mix('js/reservation.js') }}"></script>
@endpush