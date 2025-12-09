<nav class="bg-blue-600 text-white py-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">

        <a href="/" class="text-2xl font-bold">Electrend</a>

        <div class="flex gap-6">
            <a href="/" class="hover:text-blue-200">Home</a>
            <a href="/products" class="hover:text-blue-200">Products</a>
        </div>

        <div class="flex items-center gap-4">
            @auth
            <a href="{{ route('dashboard') }}" class="hover:text-blue-200">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="hover:text-blue-200">Login</a>
            <a href="{{ route('register') }}" class="bg-white text-blue-600 px-3 py-1 rounded-lg">
                Register
            </a>
            @endauth
        </div>

    </div>
</nav>
