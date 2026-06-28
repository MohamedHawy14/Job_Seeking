<x-layout>
    <x-card class="p-8 sm:p-10 max-w-2xl mx-auto mt-16 sm:mt-24 shadow-md">
        <header class="text-center mb-6">
            <h2 class="text-2xl font-bold mb-2 text-slate-800">
                {{ __('main.edit_job_title') }}
            </h2>
            <p class="text-slate-500">{{ __('main.edit_job_subtitle') }}</p>
        </header>

        <form action="/listings/{{ $listing->id }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="company" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.company_name') }}</label>
                <input
                    type="text"
                    id="company"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="company"
                    value="{{ old('company', $listing->company) }}"
                />
                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="titleAr" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.job_title_ar') }}</label>
                <input
                    type="text"
                    id="titleAr"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="titleAr"
                    value="{{ old('titleAr', $listing->titleAr) }}"
                    placeholder="{{ __('main.placeholder_job_title') }}"
                />
                @error('titleAr')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="titleEn" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.job_title_en') }}</label>
                <input
                    type="text"
                    id="titleEn"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="titleEn"
                    value="{{ old('titleEn', $listing->titleEn) }}"
                    placeholder="{{ __('main.placeholder_job_title') }}"
                />
                @error('titleEn')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="location" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.job_location') }}</label>
                <input
                    type="text"
                    id="location"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="location"
                    value="{{ old('location', $listing->location) }}"
                    placeholder="{{ __('main.placeholder_location') }}"
                />
                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.contact_email') }}</label>
                <input
                    type="email"
                    id="email"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="email"
                    value="{{ old('email', $listing->email) }}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="website" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.website_url') }}</label>
                <input
                    type="url"
                    id="website"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="website"
                    value="{{ old('website', $listing->website) }}"
                />
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tags" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.tags') }}</label>
                <input
                    type="text"
                    id="tags"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="tags"
                    value="{{ old('tags', $listing->tags) }}"
                    placeholder="{{ __('main.placeholder_tags') }}"
                />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="logo" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.company_logo') }}</label>
                <input
                    type="file"
                    id="logo"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none file:me-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-primary file:text-white file:font-medium"
                    name="logo"
                />
                <img
                    class="w-40 mt-4 rounded-lg shadow-sm"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="{{ $listing->company }}"
                />
                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descriptionAr" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.job_description_ar') }}</label>
                <textarea
                    id="descriptionAr"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="descriptionAr"
                    rows="8"
                    placeholder="{{ __('main.placeholder_description') }}"
                >{{ old('descriptionAr', $listing->descriptionAr) }}</textarea>
                @error('descriptionAr')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="descriptionEn" class="block text-sm font-semibold mb-2 text-slate-700">{{ __('main.job_description_en') }}</label>
                <textarea
                    id="descriptionEn"
                    class="border border-slate-200 rounded-xl p-3 w-full focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none"
                    name="descriptionEn"
                    rows="8"
                    placeholder="{{ __('main.placeholder_description') }}"
                >{{ old('descriptionEn', $listing->descriptionEn) }}</textarea>
                @error('descriptionEn')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap items-center gap-4 pt-2">
                <button
                    type="submit"
                    class="bg-primary hover:bg-primary-dark text-white rounded-xl py-3 px-6 font-semibold shadow-sm transition-colors"
                >
                    {{ __('main.update_job') }}
                </button>

                <a href="/" class="text-slate-600 hover:text-primary font-medium transition-colors">{{ __('main.back') }}</a>
            </div>
        </form>
    </x-card>
</x-layout>
