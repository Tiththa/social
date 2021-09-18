<div>
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">

                    @if(Auth::id() == $user_id)
                    @else
                        @livewire('add-comment',['user_id' => $user_id])
                    @endif



                    @isset($comments)
                            @if(Auth::id() == $user_id)
                            @else
                                <hr>
                            @endif
                    @endisset

                    @forelse($comments as $comment)
                        <div class="d-flex justify-content-between align-items-center py-2">
                            <div class="details d-flex">
                                <div class="w-40">
                                    <a href="{{route('wall',['username' => $comment->user->username])}}">
                                        <img src="{{ $comment->user->profile_photo_url }}" class="rounded-circle" height="50px" width="50px">
                                    </a>
                                </div>
                                <div class="d-inline">
                                    <a href="{{route('wall',['username' => $comment->user->username])}}"class="commenter-name" >
                                        <h6 class="text-bold ml-2 mb-0" style="margin-left: 1rem!important;">{{Auth::id() == $comment->user->id ? 'You' :$comment->user->name}}</h6>
                                    </a>
                                    <div style="margin-left: 1rem!important;" class="text-muted">
                                        <small><i class="ti-time"></i> commented {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                    </div>

                                    <p style="margin-left: 1rem!important;">{{$comment->comment}}</p>
                                </div>
                            </div>

                            @if(Auth::id() == $comment->user->id || Auth::user()->user_type == 'isAdmin')
                            <button type="button" wire:click="deleteComment({{$comment->id}})" class="btn btn-outline-danger friend-btn"><i class="ti-trash"></i></button>
                            @endif
                        </div>


                    @empty
                    <div class="alert alert-info">
                        No Comments yet. Add a comment!
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <style>
        .commenter-name {
            text-decoration: none;
            color: unset;
            font-weight: bolder;
        }
    </style>
@endpush
