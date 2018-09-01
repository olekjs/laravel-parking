@extends('layouts.admin')

@section('content')
<table class="table table-middle-aligned  table-hover">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>City</th>
            <th class="text-right"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->city }}</td>
                <td class="text-right">
                    <a href="{{ route('customer.edit', $customer) }}" class="btn btn-info btn-sm" title="Edytuj">
                        Edit
                    </a>
                    <a href="{{ route('customer.destroy', $customer) }}" class="btn btn-danger btn-sm" title="Edytuj">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a class="btn btn-primary btn-block" href="{{ route('customer.create') }}">Add new customer</a>
@endsection
