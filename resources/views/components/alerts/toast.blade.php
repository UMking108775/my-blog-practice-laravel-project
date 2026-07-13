@props([
    'type' => 'success',
    'message'
])

@php
    $styles = [
        'success' => [
            'class' => 'alert-success',
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2A9 9 0 1112 3a9 9 0 019 9z"/>
                </svg>'
        ],

        'error' => [
            'class' => 'alert-error',
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86L1.82 18A2 2 0 003.53 21h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0zM12 9v4m0 4h.01"/>
                </svg>'
        ],

        'warning' => [
            'class' => 'alert-warning',
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18A2 2 0 003.53 21h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>'
        ],

        'info' => [
            'class' => 'alert-info',
            'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z"/>
                </svg>'
        ],
    ];
@endphp

<div id="toast"
     class="toast toast-top toast-end z-50 transition-opacity duration-500 mt-10">
    <div class="alert {{ $styles[$type]['class'] }} shadow-lg">
        {!! $styles[$type]['icon'] !!}
        <span>{{ $message }}</span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toast = document.getElementById('toast');

    if (toast) {
        setTimeout(() => {
            toast.classList.add('opacity-0');

            setTimeout(() => {
                toast.remove();
            }, 500);
        }, 4000);
    }
});
</script>