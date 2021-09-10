<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="row ">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <!-- Current Profile Photo -->
                    <div class="mt-2 text-center" >
                        <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle" height="120px" width="120px">
                    </div>
                    <div class="text-center mt-4">
                        <h4>{{Auth::user()->name}}</h4>
                        <p>{{Auth::user()->description ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
