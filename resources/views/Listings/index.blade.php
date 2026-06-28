<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-6 mb-6">
        @unless (count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p class="text-slate-500 text-lg col-span-2 text-center py-8">{{ __('main.no_jobs_found') }}</p>
        @endunless
    </div>

    <div class="mt-6 p-4 mb-8">
        {{ $listings->links() }}
    </div>
</x-layout>
