@props(['active' => null])

<nav class="bg-white border-t border-gray-200 px-4 py-3">
    <div class="max-w-sm md:max-w-4xl mx-auto">
        <div class="grid grid-cols-4 gap-1">
        {{-- My Store --}}
        <button class="flex flex-col items-center py-2 px-1 rounded-lg transition-colors {{ $active === 'store' ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            <span class="text-xs font-medium">My store</span>
        </button>

        {{-- Orders --}}
        <button class="flex flex-col items-center py-2 px-1 rounded-lg transition-colors {{ $active === 'orders' ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="text-xs font-medium">Orders</span>
        </button>

        {{-- Products --}}
        <button class="flex flex-col items-center py-2 px-1 rounded-lg transition-colors {{ $active === 'products' ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="text-xs font-medium">Products</span>
        </button>

        {{-- Reviews --}}
        <button class="flex flex-col items-center py-2 px-1 rounded-lg transition-colors {{ $active === 'reviews' ? 'text-indigo-600' : 'text-gray-500 hover:text-gray-700' }}">
            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
            </svg>
            <span class="text-xs font-medium">Reviews</span>
        </button>
        </div>
    </div>
</nav>
