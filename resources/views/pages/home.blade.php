@extends('layout.navigation')

@section('title', 'Dashboard')
@section('content')
    <div class="content-header">
        <div class="d-flex">
            <span>
                <img src="img/icon/rentBill.png" alt="">
            </span>
            <h1 class="mx-3">House Rent</h1>
        </div>

        <!-- Add User button modal -->
        <button type="button" class="button" data-bs-toggle="modal" data-backdrop="false" data-bs-target="#addModal">
            <span class="button__text">Add Rent</span>
            <span class="button__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                </svg>
            </span>
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
