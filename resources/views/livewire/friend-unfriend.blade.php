<div>
    <div class="button-block">
        @if(Auth::user()->isFriendWith($user) == true)
            <button type="button"
                    wire:click="removeFriend({{$user->id}})"
                    class="btn btn-outline-danger friend-btn"
            >
                <i class="ti-user"></i>
                Remove friend
            </button>

        @else
            <button
                type="button"
                wire:click="addFriend({{$user->id}})"
                class="btn btn-outline-dark friend-btn"
            >
                <i class="ti-user"></i>
                Add friend
            </button>

        @endif
    </div>

</div>
