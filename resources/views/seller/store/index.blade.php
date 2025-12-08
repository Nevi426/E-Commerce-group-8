@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">My Store</h1>

    @if($store)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="font-semibold">{{ $store->name }}</h2>
            @if($store->logo)
                <img src="{{ asset('storage/'.$store->logo) }}" class="h-24" alt="logo">
            @endif
            <p>{{ $store->about }}</p>
            <p>{{ $store->address }}, {{ $store->city }}</p>
            <p>Verified: {{ $store->is_verified ? 'Yes' : 'No' }}</p>

            <form action="{{ route('seller.store.update', $store->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="text" name="name" value="{{ $store->name }}" class="border p-2 mb-2 w-full" />
                <input type="file" name="logo" class="mb-2" />
                <textarea name="about" class="border p-2 w-full mb-2">{{ $store->about }}</textarea>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Update Store</button>
            </form>
        </div>
    @else
        <div class="bg-white p-4 rounded shadow">
            <h2>Create Store</h2>
            <form action="{{ route('seller.store.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="name" placeholder="Store name" class="border p-2 w-full mb-2" />
                <input type="file" name="logo" class="mb-2" />
                <textarea name="about" placeholder="About" class="border p-2 w-full mb-2"></textarea>
                <button class="bg-green-600 text-white px-4 py-2 rounded">Create</button>
            </form>
        </div>
    @endif
</div>
@endsection
