<x-layout>
    <a
        href="/"
        class="inline-flex items-center gap-2 text-slate-700 hover:text-primary mb-6 mt-4 font-medium transition-colors"
    >
        <i class="fa-solid fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"></i>
        {{ __('main.back') }}
    </a>

    <div class="mb-8">
        <x-card class="p-8 sm:p-10 shadow-md">
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-40 sm:w-48 mb-6 rounded-xl object-cover shadow-sm"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="{{ $listing->company }}"
                />

                <h3 class="text-2xl sm:text-3xl font-bold mb-2 text-slate-800">{{ $listing->title }}</h3>
                <div class="text-xl font-semibold text-primary mb-4">{{ $listing->company }}</div>
                <x-listing-tags :tagsCsv="$listing->tags" />
                <div class="text-lg text-slate-600 my-4 flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-primary"></i>
                    {{ $listing->location }}
                </div>
                <div class="border border-slate-200 w-full mb-6"></div>
                <div class="w-full text-start">
                    <h3 class="text-2xl font-bold mb-4 text-slate-800">
                        {{ __('main.job_description') }}
                    </h3>
                    <div class="text-lg text-slate-600 space-y-4 leading-relaxed">
                        <p>{{ $listing->description }}</p>

                        <a
                            href="mailto:{{ $listing->email }}"
                            class="block bg-primary hover:bg-primary-dark text-white mt-6 py-3 px-4 rounded-xl font-medium shadow-sm transition-colors"
                        >
                            <i class="fa-solid fa-envelope"></i>
                            {{ __('main.contact_employer') }}
                        </a>

                        <a
                            href="{{ $listing->website }}"
                            target="_blank"
                            class="block bg-slate-800 hover:bg-slate-700 text-white py-3 px-4 rounded-xl font-medium shadow-sm transition-colors"
                        >
                            <i class="fa-solid fa-globe"></i>
                            {{ $listing->website }}
                        </a>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>
