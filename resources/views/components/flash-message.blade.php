@if (session()->has('message'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="fixed top-20 start-1/2 -translate-x-1/2 bg-primary text-white px-8 py-3 rounded-xl shadow-lg z-50 max-w-md text-center"
    >
        <p>{{ session('message') }}</p>
    </div>
@endif
