<x-layout>
    <x-card class="p-8 sm:p-10 max-w-lg mx-auto mt-16 sm:mt-24 shadow-md">
        <header class="text-center mb-6">
            <h2 class="text-2xl font-bold mb-2 text-slate-800">
                {{ __('main.register_title') }}
            </h2>
            <p class="text-slate-500">{{ __('main.register_subtitle') }}</p>
        </header>

        <form action="/users" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.name') }}</label>
                <input
                    type="text"
                    id="name"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-shadow"
                    name="name"
                    value="{{ old('name') }}"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.email') }}</label>
                <input
                    type="email"
                    id="email"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-shadow"
                    name="email"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.password') }}</label>
                <input
                    type="password"
                    id="password"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-shadow"
                    name="password"
                />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.confirm_password') }}</label>
                <input
                    type="password"
                    id="password_confirmation"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-shadow"
                    name="password_confirmation"
                />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-primary-dark text-white rounded-xl py-3 px-4 font-semibold shadow-sm transition-colors"
                >
                    {{ __('main.sign_up') }}
                </button>
            </div>

            <div class="text-center pt-2">
                <p class="text-slate-600">
                    {{ __('main.have_account') }}
                    <a href="/login" class="text-primary font-semibold hover:text-primary-dark transition-colors">{{ __('main.login') }}</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
