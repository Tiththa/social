<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class WallComments extends Component
{
    public $user_id;
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];


    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function render()
    {
        $this->comments = Comment::where('receiver_id', $this->user_id)->latest()->get();

        return view('livewire.wall-comments')->with(['comments' => $this->comments]);
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        $this->alert(
            'success',
            'Comment Deleted!'
        );
    }
}
