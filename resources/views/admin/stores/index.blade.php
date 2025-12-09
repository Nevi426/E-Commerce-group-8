@extends('admin.layout')

@section('title', 'Store Verification')

@section('content')

@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4 shadow">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-blue-700 text-white">
        <tr>
            <th class="p-3">Store Name</th>
            <th class="p-3">Owner</th>
            <th class="p-3">Phone</th>
            <th class="p-3 text-center">Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($stores as $store)
        <tr class="border-b hover:bg-gray-100">
            <td class="p-3">{{ $store->name }}</td>
            <td class="p-3">{{ $store->user->name }}</td>
            <td class="p-3">{{ $store->phone }}</td>

            <td class="p-3 flex justify-center gap-2">

                <form method="POST" action="{{ route('admin.stores.verify', $store->id) }}">
                    @csrf
                    @method('PUT')
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded shadow">
                        ✔ Verify
                    </button>
                </form>

                <form method="POST" action="{{ route('admin.stores.reject', $store->id) }}">
                    @csrf
                    @method('PUT')
                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded shadow">
                        ✖ Reject
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
