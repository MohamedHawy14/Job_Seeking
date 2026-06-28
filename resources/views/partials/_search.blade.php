<form action="/">
    <div class="relative border border-slate-200 m-4 rounded-xl shadow-sm bg-white">
        <div class="absolute top-1/2 -translate-y-1/2 start-4">
            <i class="fa fa-search text-slate-400"></i>
        </div>

        <input
            type="text"
            name="search"
            class="h-14 w-full ps-12 pe-28 rounded-xl focus:ring-2 focus:ring-primary/30 focus:border-primary border-0 outline-none"
            placeholder="{{ __('main.search_placeholder') }}"
        />

        <div class="absolute top-1/2 -translate-y-1/2 end-2">
            <button
                type="submit"
                class="h-10 px-5 text-white rounded-lg bg-primary hover:bg-primary-dark font-medium transition-colors shadow-sm"
            >
                {{ __('main.search_button') }}
            </button>
        </div>
    </div>
</form>
