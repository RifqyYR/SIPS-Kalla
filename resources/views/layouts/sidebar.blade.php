<aside id="default-sidebar" class="top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white shadow">
        <div class="flex justify-center mb-4">
            <img class="w-24" src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Kalla_Toyota_Logo_png.png" alt="Kalla Toyota">
        </div>
        <ul class="space-y-2">
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('cars')" :active="request()->routeIs('cars')">
                    {{ __('Cars') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('sparepart')" :active="request()->routeIs('sparepart')">
                    {{ __('Sparepart') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('service')" :active="request()->routeIs('service')">
                    {{ __('Service') }}
                </x-nav-link>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 hover:text-green-900 rounded-lg hover:bg-gray-100 group">
                    <span class="ml-3">Suggestion</span>
                </a>
            </li>
            <li>
                <x-nav-link :href="route('user_management')" :active="request()->routeIs('user_management')">
                    {{ __('User Management') }}
                </x-nav-link>
            </li>
        </ul>
    </div>
</aside>