<aside id="default-sidebar" class="hidden sm:block fixed left-0 h-full p-4 text-sm w-64 bg-[#043927]" aria-label="Sidenav">
    <div class="relative">
        <div class=" py-5 px-3 h-screen">
            <div class="flex justify-center mb-10">
                <a href="{{ route('dashboard') }}">
                    <img width="90" src="{{ url('logo.svg') }}" alt="Logo Kalla Toyota">
                </a>
            </div>
            <ul class="space-y-2">
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('catalog.index')" :active="request()->routeIs('catalog*')">
                        {{ __('Katalog Mobil') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('sparepart.index')" :active="request()->routeIs('sparepart*')">
                        {{ __('Suku Cadang') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('customer.index')" :active="request()->routeIs('customer*')">
                        {{ __('Customer') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('service.index')" :active="request()->routeIs('service*')">
                        {{ __('Servis') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('sales.index')" :active="request()->routeIs('sales*')">
                        {{ __('Sales') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('pic.index')" :active="request()->routeIs('pic*')">
                        {{ __('PIC') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('promo.index')" :active="request()->routeIs('promo*')">
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