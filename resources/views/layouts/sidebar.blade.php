<aside id="default-sidebar" class="fixed left-0 h-full p-4 w-64 bg-[#043927]" aria-label="Sidenav">
    <div class="relative">
        <div class="overflow-y-auto py-5 px-3 h-screen">
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
                    <x-nav-link :href="route('client_cars')" :active="request()->routeIs('client_cars')">
                        {{ __('Client Cars') }}
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
                    <x-nav-link :href="route('suggestion')" :active="request()->routeIs('suggestion')">
                        {{ __('Suggestion') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('user_management')" :active="request()->routeIs('user_management')">
                        {{ __('User Management') }}
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</aside>