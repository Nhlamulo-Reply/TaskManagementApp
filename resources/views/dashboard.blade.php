
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <x-container>
        <x-filter></x-filter>
    </x-container>

</x-app-layout>

