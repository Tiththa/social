<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Your Wall') }}
        </h2>
    </x-slot>



    @livewire('wall-comments',['user_id' => $user->id])

</x-app-layout>
