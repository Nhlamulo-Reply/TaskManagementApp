@props([
    'maxWidth' => '7xl',
    'padding' => 'py-12',
    'background' => 'bg-white',
])

<div class="{{ $padding }}">
    <div class="max-w-{{ $maxWidth }} mx-auto sm:px-6 lg:px-8">
        <div class="{{ $background }} overflow-hidden shadow-sm sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
