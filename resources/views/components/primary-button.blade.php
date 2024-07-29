<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 md:px-4 lg:px-4 xl:px-4 py-2 bg-[#01803D] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#09A04F] focus:bg-[#09A04F] active:bg-[#01632F] focus:outline-none focus:ring-2 focus:ring-[#01803D] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
