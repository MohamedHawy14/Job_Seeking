<form action="/">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 start-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>

        <input type="text" name="search"
            class="h-14 w-full ps-10 pe-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="{{ __('main.search_placeholder') }}" />

        <div class="absolute top-2 end-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
                {{ __('main.search_button') }}
            </button>
        </div>
    </div>
</form>
