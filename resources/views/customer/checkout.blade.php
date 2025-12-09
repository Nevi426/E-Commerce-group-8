<x-app-layout>

    <div class="max-w-3xl mx-auto py-12 px-6">

        <h2 class="text-3xl font-bold mb-8">Checkout</h2>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label class="font-semibold">Shipping Address</label>
                <textarea name="address" class="w-full border rounded-lg p-3" required></textarea>
            </div>

            <div class="mb-5">
                <label class="font-semibold">Shipping Type</label>
                <select name="shipping" class="w-full border rounded-lg p-3" required>
                    <option value="regular">Regular</option>
                    <option value="express">Express</option>
                </select>
            </div>

            <button class="bg-blue-600 text-white px-6 py-3 mt-4 rounded-xl hover:bg-blue-700">
                Complete Purchase
            </button>

        </form>

    </div>

</x-app-layout>
