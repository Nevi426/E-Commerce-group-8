<x-app-layout>

    <div class="max-w-6xl mx-auto py-10 px-6 grid grid-cols-1 lg:grid-cols-2 gap-10">

        <!-- IMAGES -->
        <div>
            <img src="{{ $product->image_url }}" class="w-full rounded-xl shadow-lg">

            <div class="flex gap-3 mt-4">
                @foreach ($product->images as $img)
                    <img src="{{ $img->url }}" class="w-24 h-24 object-cover rounded-md shadow">
                @endforeach
            </div>
        </div>

        <!-- INFORMATION -->
        <div>
            <h2 class="text-4xl font-bold">{{ $product->name }}</h2>
            <p class="text-2xl text-blue-600 font-semibold mt-2">Rp {{ number_format($product->price) }}</p>

            <p class="mt-4 text-gray-700">{{ $product->description }}</p>

            <p class="mt-4 text-sm text-gray-500">
                Category: <span class="font-semibold">{{ $product->category->name }}</span>
            </p>

            <a href="{{ route('checkout.index') }}" 
               class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700">
                Buy Now
            </a>
        </div>

    </div>

    <div class="max-w-5xl mx-auto mt-12 px-6">
        <h3 class="text-2xl font-bold mb-4">Reviews</h3>

        @forelse ($product->reviews as $review)
            <div class="bg-white p-4 shadow rounded-xl mb-3">
                <strong>{{ $review->user->name }}</strong>
                <p class="text-gray-600">{{ $review->review }}</p>
            </div>
        @empty
            <p class="text-gray-500">No reviews yet.</p>
        @endforelse
    </div>

</x-app-layout>
