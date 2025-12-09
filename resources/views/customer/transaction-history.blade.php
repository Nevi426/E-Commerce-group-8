<x-app-layout>

    <div class="max-w-5xl mx-auto py-10 px-6">

        <h2 class="text-3xl font-bold mb-6">Transaction History</h2>

        @foreach ($transactions as $t)
            <div class="bg-white p-5 rounded-xl shadow mb-4">
                <p class="font-semibold">Transaction #{{ $t->id }}</p>
                <p class="text-gray-600">Address: {{ $t->address }}</p>
                <p class="text-gray-600">Shipping: {{ $t->shipping_type }}</p>
                <p class="font-bold text-blue-700 mt-2">Total: Rp {{ number_format($t->total_price) }}</p>
            </div>
        @endforeach

    </div>

</x-app-layout>
