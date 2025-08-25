@props(['title' => 'Orders'])

<header class="bg-white px-4 py-4 border-b border-gray-100">
    <div class="max-w-sm md:max-w-4xl mx-auto">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">{{ $title }}</h1>
            <button type="button" aria-label="Filter" class="p-2 rounded-lg text-indigo-600 hover:bg-indigo-50 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>
