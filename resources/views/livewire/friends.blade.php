<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="list-group">
                @forelse($friends as $friend)
                    <div  class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div class="details d-flex">
                            <div class="w-40">
                                <a href="{{route('wall',['username' => $friend->recipient->username])}}">
                                    <img src="{{ $friend->recipient->profile_photo_url }}" class="pr-2" height="80px" width="80px" >
                                </a>
                            </div>
                            <div>
                                <a href="{{route('wall',['username' => $friend->recipient->username])}}" class="profile-title">
                                    <h5 class="text-bold ml-2 mb-0" style="margin-left: 1rem!important;">{{$friend->recipient->name}}</h5>
                                </a>
                                <span style="margin-left: 1rem!important;" class="text-muted">
                                    <i class="ti-pin"></i>
                                    {{$friend->recipient->location ? $friend->recipient->location : 'Location not updated'}}
                                </span>
                                <div style="margin-left: 1rem!important;" class="text-muted">
                                    <i class="ti-time"></i>
                                    Joined {{\Carbon\Carbon::parse($friend->recipient->created_at)->diffForHumans()}}
                                </div>
                            </div>
                        </div>

                        <button type="button" wire:click="removeFriend({{Auth::id() == $friend->recipient->id ? $friend->Sender->id : $friend->recipient->id}})" class="btn btn-outline-danger friend-btn"><i class="ti-user"></i> Remove friend</button>

                    </div>
                @empty
                <a href="#" class="list-group-item list-group-item-action">
                    You have no friends to show. Add friends!
                </a>
                @endforelse

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6" >
            <h5 class="my-3">People You may know</h5>
            <div class="list-group">

                @forelse($users as $user)

                    @if(Auth::user()->isFriendWith($user) == true)

                    @else
                        <div  class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="details d-flex">
                                <div class="w-40">
                                    <a href="{{route('wall',['username' => $user->username])}}">
                                        <img src="{{ $user->profile_photo_url }}" class="pr-2" height="80px" width="80px">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{route('wall',['username' => $user->username])}}" class="profile-title">
                                        <h5 class="text-bold ml-2 mb-0" style="margin-left: 1rem!important;">{{$user->name}}</h5>
                                    </a>
                                    <span style="margin-left: 1rem!important;" class="text-muted">
                                    <i class="ti-pin"></i>
                                    {{$user->location ? $user->location : 'Location not updated'}}
                                </span>
                                    <div style="margin-left: 1rem!important;" class="text-muted">
                                        <i class="ti-time"></i>
                                        Joined {{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
                                    </div>
                                </div>
                            </div>

                            @if(Auth::user()->isFriendWith($user) == true)

                                <button type="button" wire:click="removeFriend({{$user->id}})" class="btn btn-outline-danger friend-btn"><i class="ti-user"></i> Remove friend</button>

                            @else

                                <button type="button" wire:click="addFriend({{$user->id}})" class="btn btn-outline-dark friend-btn"><i class="ti-user"></i> Add friend</button>

                            @endif


                        </div>
                    @endif


                @empty
                    <a href="#" class="list-group-item list-group-item-action">
                        No one had signedup yet!
                    </a>
                @endforelse
            </div>
            {{$users->links()}}
        </div>
    </div>
</div>

@push('styles')
    <style>
        a.profile-title {
            text-decoration: none;
            color: unset;
        }
        a.profile-title:hover {
            color: royalblue;
        }
    </style>
@endpush
