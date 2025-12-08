<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Store Verification
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Owner</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border w-48">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($stores as $store)
                            <tr>
                                <td class="px-4 py-2 border">{{ $store->name }}</td>
                                <td class="px-4 py-2 border">{{ $store->user->name }}</td>
                                <td class="px-4 py-2 border">{{ ucfirst($store->status) }}</td>

                                <td class="px-4 py-2 border">
                                    @if($store->status == 'pending')

                                        <form action="{{ route('admin.stores.verify', $store->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                                Approve
                                            </button>
                                        </form>

                                        <form action="{{ route('admin.stores.reject', $store->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                                Reject
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500">Completed</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    No store submissions.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </div>

</x-app-layout>
