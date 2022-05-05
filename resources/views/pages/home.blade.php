@extends('layout.navigation')

@section('title', 'Home')
@section('content')
    <div class="content-header">
        <div class="d-flex">
            <span>
                <img src="img/icon/rentBill.png" alt="">
            </span>
            <h1 class="mx-3"></h1>
        </div>

        <!-- Add User button modal -->
        <button type="button" class="btn btn-primary btn-rounded">         
            <i class="fas fa-plus me-2"></i>
            <span class="button__text">Add Rent</span>
        </button>
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
