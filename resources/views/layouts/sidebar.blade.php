<aside id="default-sidebar" class="hidden sm:block fixed left-0 h-full p-4 text-sm w-64 bg-[#043927]" aria-label="Sidenav">
    <div class="relative">
        <div class=" py-5 px-3 h-screen">
            <div class="flex justify-center mb-10">
                <img width="90" src="{{ url('logo.svg') }}" alt="Logo Kalla Toyota">
            </div>
            <ul class="space-y-2">
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('catalog_cars')">
                        {{ __('Katalog Mobil') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('sparepart')">
                        {{ __('Suku Cadang') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('client_cars')">
                        {{ __('Customer') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('service')">
                        {{ __('Servis') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('sales')">
                        {{ __('Sales') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('pic')">
                        {{ __('PIC') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :active="request()->routeIs('promo')">
                        {{ __('Promo') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('admin-management.index')" :active="request()->routeIs('admin-management*')">
                        {{ __('Manajemen Admin') }}
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</aside>