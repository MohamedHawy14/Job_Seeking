<x-layout>
    <x-card class="p-8 sm:p-10 mt-8 mb-8 shadow-md">
        <header>
            <h1 class="text-2xl sm:text-3xl text-center font-bold my-6 text-slate-800">
                {{ __('main.manage_jobs') }}
            </h1>
        </header>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <tbody>
                    @unless ($listings->isEmpty())
                        @foreach ($listings as $listing)
                            <tr class="border-b border-slate-200 hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-5 text-base sm:text-lg">
                                    <a href="/listings/{{ $listing->id }}" class="font-medium hover:text-primary transition-colors">
                                        {{ $listing->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-5 text-base sm:text-lg">
                                    <a
                                        href="/listings/{{ $listing->id }}/edit"
                                        class="text-primary hover:text-primary-dark font-medium transition-colors"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        {{ __('main.edit') }}
                                    </a>
                                </td>
                                <td class="px-4 py-5 text-base sm:text-lg">
                                    <form method="POST" action="/listings/{{ $listing->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition-colors">
                                            <i class="fa-solid fa-trash"></i>
                                            {{ __('main.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="px-4 py-8 text-lg text-center text-slate-500">
                                {{ __('main.no_jobs_manage') }}
                            </td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </div>
    </x-card>
</x-layout>
