<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Friends') }}
        </h2>
    </x-slot>

    {{-- Show Auth user Friends--}}
    @livewire('friends')



</x-app-layout>
