<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Wall of '. $user->name)   }}
        </h2>
    </x-slot>

    <div class="row ">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <!-- Current Profile Photo -->
                    <div class="mt-2 text-center" >
                        <img src="{{ $user->profile_photo_url }}" class="rounded-circle" height="120px" width="120px">
                    </div>
                    <div class="text-center mt-4">
                        <h4>{{ $user->name}}</h4>
                        <p>{{ $user->description ?? ''}}</p>

                        @livewire('friend-unfriend',['user_id' => $user->id])

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            @livewire('wall-comments',['user_id' => $user->id])
        </div>
    </div>
</x-app-layout>
