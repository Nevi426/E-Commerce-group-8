<nav class="w-full bg-white shadow-md px-6 py-4 flex justify-between items-center">

    {{-- LEFT: LOGO --}}
    <a href="/" class="flex items-center space-x-2">
        <img src="https://i.pinimg.com/1200x/3a/fb/c7/3afbc774b594137b62c78e05ed5e6ba1.jpg" 
             class="w-16 h-16" alt="logo">
        <span class="text-2xl font-bold text-blue-600">ElecTrend</span>
    </a>

    {{-- MIDDLE NAVIGATION --}}
    <ul class="flex gap-6 text-gray-700 font-medium">

        {{-- ===================== CUSTOMER ===================== --}}
        @auth
            @if(Auth::user()->role === 'customer')
                <li><a href="{{ route('products') }}" class="hover:text-blue-600">All Products</a></li>
                <li><a href="/products/category/1" class="hover:text-blue-600">By Category</a></li>
                <li><a href="{{ route('transaction.history') }}" class="hover:text-blue-600">Transaction History</a></li>
                <li><a href="{{ route('cart.index') }}" class="hover:text-blue-600">My Cart</a></li>
            @endif

            {{-- ===================== SELLER ===================== --}}
            @if(Auth::user()->role === 'seller')
                <li><a href="{{ route('seller.store') }}" class="hover:text-blue-600">Store Profile</a></li>
                <li><a href="/seller/products" class="hover:text-blue-600">Manage Products</a></li>
                <li><a href="{{ route('seller.orders') }}" class="hover:text-blue-600">Orders</a></li>
                <li><a href="{{ route('seller.balance') }}" class="hover:text-blue-600">Balance</a></li>
                <li><a href="{{ route('seller.withdraw') }}" class="hover:text-blue-600">Withdrawal</a></li>
            @endif

            {{-- ===================== ADMIN ===================== --}}
            @if(Auth::user()->role === 'admin')
                <li><a href="{{ route('admin.stores') }}" class="hover:text-blue-600">Store Verification</a></li>
                <li><a href="{{ route('admin.users') }}" class="hover:text-blue-600">User Management</a></li>
            @endif
        @endauth

    </ul>

    {{-- RIGHT: USER DROPDOWN --}}
    <div class="flex items-center space-x-6">

        @auth
            <div class="relative">
                <button onclick="toggleDropdown()" 
                    class="flex items-center space-x-1 text-gray-700 hover:text-blue-600 font-medium">
                    <span>{{ Auth::user()->name }}</span>

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" 
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- FIX: Dropdown tidak melorot --}}
                <div id="userDropdown"
                    class="hidden absolute right-0 top-full mt-2 bg-white border rounded-md shadow-lg w-40 py-2 z-50">

                    <a href="/profile"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <a href="/login" class="nav-item">Login</a>
            <a href="/register" class="nav-item">Register</a>
        @endguest

    </div>

</nav>

<style>
    .nav-item {
        @apply text-gray-700 hover:text-blue-600 font-medium;
    }
</style>

<script>
    function toggleDropdown() {
        let menu = document.getElementById('userDropdown');
        menu.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
        let dropdown = document.getElementById('userDropdown');
        let button = event.target.closest('button');

        if (!dropdown.contains(e.target) && !button) {
            dropdown.classList.add('hidden');
        }
    });
</script>
