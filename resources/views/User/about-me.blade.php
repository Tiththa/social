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
                        <p class="p-0 m-0 text-muted"><i class="ti ti-time "></i> {{ Auth::user()->dob ? Auth::user()->dob : 'Birthday not specified'}}</p>
                        <p class="p-0 m-0 text-muted"><i class="ti ti-pin"></i> {{ Auth::user()->location ? Auth::user()->location : 'Location not specified'}}</p>
                        <p class="p-0 m-0 "</i> {{ Auth::user()->decription ? Auth::user()->decription : 'Apparently, this user prefers to keep an air of mystery about them. '}}</p>
                        <a href="{{route('profile.show')}}" class="btn btn-dark mt-3">Edit profile</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
