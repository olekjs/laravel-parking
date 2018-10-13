@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        @foreach($conversations as $conversation)
            <p>{{ $conversation->title }} <a href="{{ route('conversation.index', $conversation ) }}" class="btn btn-primary">Show conversation</a></p>
        @endforeach
    </div>
</div>
@endsection
