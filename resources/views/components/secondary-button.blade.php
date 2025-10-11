<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center futura-book rounded-full border border border-primary px-7 py-2 md:px-8 md:py-4 bg-primary text-primary-white uppercase tracking-widest shadow-sm focus:outline-none focus:ring-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>