@extends('admin.layout')

@section('title', 'User Management')

@section('content')

@if (session('success'))
<div class="bg-green-500 text-white p-3 rounded mb-4 shadow">
    {{ session('success') }}
</div>
@endif

{{-- USER LIST --}}
<div class="bg-white p-5 rounded-lg shadow mb-10">

    <h3 class="text-xl font-semibold text-blue-700 mb-4">All Users</h3>

    <table class="w-full">
        <thead class="bg-blue-700 text-white">
        <tr>
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Role</th>
            <th class="p-3 text-center">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($users as $user)
        <tr class="border-b hover:bg-gray-100">
            <td class="p-3">{{ $user->name }}</td>
            <td class="p-3">{{ $user->email }}</td>
            <td class="p-3">{{ ucfirst($user->role) }}</td>

            <td class="p-3 text-center">
                @if($user->role !== 'admin')
                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded shadow">
                        Delete
                    </button>
                </form>
                @else
                    <span class="text-gray-500">Super Admin</span>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

{{-- STORE LIST --}}
<div class="bg-white p-5 rounded-lg shadow">

    <h3 class="text-xl font-semibold text-blue-700 mb-4">Stores</h3>

    <table class="w-full">
        <thead class="bg-blue-700 text-white">
        <tr>
            <th class="p-3">Store</th>
            <th class="p-3">Owner</th>
            <th class="p-3">Status</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($stores as $store)
        <tr class="border-b hover:bg-gray-100">
            <td class="p-3">{{ $store->name }}</td>
            <td class="p-3">{{ $store->user->name }}</td>
            <td class="p-3">
                @if ($store->is_verified)
                    <span class="bg-green-500 text-white px-3 py-1 rounded">Verified</span>
                @else
                    <span class="bg-yellow-500 text-white px-3 py-1 rounded">Pending</span>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection
