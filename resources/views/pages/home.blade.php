@extends('layout.navigation')

@section('title', 'Home')
@section('content')
    <div class="content-header">
        <div class="">
            <h1 class="mx-3 paytone-font">Home</h1>
        </div>
    </div>
    <hr>
    <table class="table align-items-center table-hover" id="table-content">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tenant</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->id }}</td>
                    <td>{{ $tenant->firstname }} {{ $tenant->lastname }}</td>
                    <td>{{ $tenant->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
