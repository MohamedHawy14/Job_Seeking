<section class="relative -mx-4 sm:-mx-6 lg:-mx-8 h-72 bg-gradient-to-br from-primary to-primary-dark flex flex-col justify-center items-center text-center gap-4 mb-6 overflow-hidden">
    <div
        class="absolute inset-0 opacity-10 bg-no-repeat bg-center bg-contain"
        style="background-image: url('images/laravel-logo.png')"
    ></div>

    <div class="relative z-10 px-4">
        <h1 class="text-4xl sm:text-6xl font-bold uppercase text-white tracking-tight">
            {!! __('main.hero_title') !!}
        </h1>
        <p class="text-xl sm:text-2xl text-sky-100 font-medium my-4">
            {{ __('main.hero_subtitle') }}
        </p>
        <div>
            @guest
                <a
                    href="/register"
                    class="inline-block border-2 border-white text-white py-2.5 px-6 rounded-xl uppercase text-sm font-semibold mt-2 hover:bg-white hover:text-primary transition-colors shadow-sm"
                >
                    {{ __('main.sign_up_btn') }}
                </a>
            @endguest
        </div>
    </div>
</section>
