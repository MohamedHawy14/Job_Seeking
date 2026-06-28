@props(['listing'])

<x-card class="hover:shadow-md transition-shadow">
    <div class="flex gap-4">
        <img
            class="hidden w-40 sm:w-48 shrink-0 rounded-lg object-cover md:block"
            src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
            alt="{{ $listing->company }}"
        />
        <div class="min-w-0">
            <h3 class="text-xl sm:text-2xl font-semibold">
                <a href="{{ route('listings.show', $listing->id) }}" class="hover:text-primary transition-colors">
                    {{ $listing->title }}
                </a>
            </h3>
            <div class="text-lg font-bold text-slate-700 mb-3">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-base text-slate-600 mt-3 flex items-center gap-2">
                <i class="fa-solid fa-location-dot text-primary"></i>
                {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
