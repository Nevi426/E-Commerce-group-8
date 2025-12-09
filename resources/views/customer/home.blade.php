<x-app-layout>

    <div class="max-w-7xl mx-auto py-10 px-6">

        <h2 class="text-3xl font-bold mb-6 text-blue-800">Latest Products</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $p)
                <a href="{{ route('product.show', $p->id) }}" class="block bg-white shadow-md rounded-xl p-4 hover:shadow-xl transition">
                    <img src="{{ $p->image_url }}" class="w-full h-40 object-cover rounded-md">
                    <h3 class="font-semibold mt-3">{{ $p->name }}</h3>
                    <p class="text-blue-600 font-bold mt-1">Rp {{ number_format($p->price) }}</p>
                </a>
            @endforeach
        </div>

        <h2 class="text-3xl font-bold mt-12 mb-4 text-blue-800">Categories</h2>

        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($categories as $c)
                <a href="{{ route('product.category', $c->id) }}" class="p-4 bg-blue-100 rounded-xl text-center hover:bg-blue-200 transition">
                    {{ $c->name }}
                </a>
            @endforeach
        </div>

    </div>

</x-app-layout>
