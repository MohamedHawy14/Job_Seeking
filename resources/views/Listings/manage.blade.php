<x-layout>
    <x-card class="p-8 sm:p-10 mt-8 mb-8 shadow-md">
        <header>
            <h1 class="text-2xl sm:text-3xl text-center font-bold my-6 text-slate-800">
                {{ __('main.manage_jobs') }}
            </h1>
        </header>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <tbody id="listings-table-body">
                    @unless ($listings->isEmpty())
                        @foreach ($listings as $listing)
                            <tr
                                class="border-b border-slate-200 hover:bg-slate-50 transition-colors listing-row"
                                data-listing-id="{{ $listing->id }}"
                            >
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
                                    <button
                                        type="button"
                                        class="delete-listing-btn text-red-500 hover:text-red-700 font-medium transition-colors"
                                        data-id="{{ $listing->id }}"
                                        data-title="{{ $listing->title }}"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                        {{ __('main.delete') }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr id="empty-listings-row">
                            <td colspan="3" class="px-4 py-8 text-lg text-center text-slate-500">
                                {{ __('main.no_jobs_manage') }}
                            </td>
                        </tr>
                    @endunless
                </tbody>
            </table>
        </div>
    </x-card>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = @json(csrf_token());
            const isRtl = document.documentElement.dir === 'rtl';
            const i18n = {
                title: @json(__('main.delete_confirm_title')),
                text: @json(__('main.delete_confirm_text')),
                confirm: @json(__('main.delete_confirm_yes')),
                cancel: @json(__('main.delete_confirm_cancel')),
                success: @json(__('main.job_deleted')),
                error: @json(__('main.delete_error')),
                empty: @json(__('main.no_jobs_manage')),
            };

            document.querySelectorAll('.delete-listing-btn').forEach((button) => {
                button.addEventListener('click', () => {
                    const listingId = button.dataset.id;
                    const listingTitle = button.dataset.title;

                    Swal.fire({
                        title: i18n.title,
                        text: i18n.text.replace(':title', listingTitle),
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#ef4444',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: i18n.confirm,
                        cancelButtonText: i18n.cancel,
                        reverseButtons: isRtl,
                    }).then(async (result) => {
                        if (!result.isConfirmed) {
                            return;
                        }

                        try {
                            const response = await fetch(`/listings/${listingId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'Accept': 'application/json',
                                    'Content-Type': 'application/json',
                                },
                            });

                            if (!response.ok) {
                                throw new Error('Delete failed');
                            }

                            const row = document.querySelector(`tr[data-listing-id="${listingId}"]`);
                            row?.remove();

                            const tbody = document.getElementById('listings-table-body');
                            if (tbody && !tbody.querySelector('.listing-row')) {
                                tbody.innerHTML = `
                                    <tr id="empty-listings-row">
                                        <td colspan="3" class="px-4 py-8 text-lg text-center text-slate-500">${i18n.empty}</td>
                                    </tr>
                                `;
                            }

                            Swal.fire({
                                title: i18n.success,
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        } catch {
                            Swal.fire({
                                title: i18n.error,
                                icon: 'error',
                                confirmButtonColor: '#0ea5e9',
                            });
                        }
                    });
                });
            });
        });
    </script>
</x-layout>
