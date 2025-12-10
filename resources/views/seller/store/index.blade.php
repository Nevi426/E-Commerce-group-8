<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">My Store</h2>
    </x-slot>

    <div class="p-6">

        {{-- If no store created --}}
        @if(!$store)
            <h3 class="text-lg font-bold mb-4">Create Store</h3>

            <form action="{{ route('seller.store.create') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="font-semibold">Store Name</label>
                        <input type="text" name="name" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">Logo</label>
                        <input type="file" name="logo" class="border p-2 w-full">
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">About</label>
                        <textarea name="about" class="border p-2 w-full" required></textarea>
                    </div>

                    <div>
                        <label class="font-semibold">Phone</label>
                        <input type="text" name="phone" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">Address ID</label>
                        <input type="text" name="address_id" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">City</label>
                        <input type="text" name="city" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">Postal Code</label>
                        <input type="text" name="postal_code" class="border p-2 w-full" required>
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">Full Address</label>
                        <textarea name="address" class="border p-2 w-full" required></textarea>
                    </div>

                </div>

                <button class="bg-blue-600 text-white px-4 py-2 mt-4 rounded">
                    Create Store
                </button>
            </form>

        @else

            {{-- Store already exists --}}
            <h3 class="text-lg font-bold mb-4">Update Store</h3>

            <form action="{{ route('seller.store.update', $store->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="font-semibold">Store Name</label>
                        <input type="text" name="name" value="{{ $store->name }}" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">Logo</label>
                        <input type="file" name="logo" class="border p-2 w-full">
                        @if($store->logo)
                            <img src="{{ asset('storage/'.$store->logo) }}" class="w-20 mt-2">
                        @endif
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">About</label>
                        <textarea name="about" class="border p-2 w-full" required>{{ $store->about }}</textarea>
                    </div>

                    <div>
                        <label class="font-semibold">Phone</label>
                        <input type="text" name="phone" value="{{ $store->phone }}" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">Address ID</label>
                        <input type="text" name="address_id" value="{{ $store->address_id }}" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">City</label>
                        <input type="text" name="city" value="{{ $store->city }}" class="border p-2 w-full" required>
                    </div>

                    <div>
                        <label class="font-semibold">Postal Code</label>
                        <input type="text" name="postal_code" value="{{ $store->postal_code }}" class="border p-2 w-full" required>
                    </div>

                    <div class="col-span-2">
                        <label class="font-semibold">Full Address</label>
                        <textarea name="address" class="border p-2 w-full" required>{{ $store->address }}</textarea>
                    </div>

                </div>

                <button class="bg-green-600 text-white px-4 py-2 mt-4 rounded">
                    Update Store
                </button>
            </form>

            <form action="{{ route('seller.store.delete', $store->id) }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 text-white px-4 py-2 rounded">Delete Store</button>
            </form>

        @endif
    </div>

</x-app-layout>
