<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;
use Log;

class AddComment extends Component
{
    public $user;
    public $comment = null;

    protected function rules()
    {
        return [
            'comment' => [
                'required',
                function ($attribute, $value, $fail) {
                    $count = str_word_count(strip_tags($value));
                    if ($count < 1 || $count >= 80) {
                        $fail("Comment should have at least 1 word and shouldn't exceed 80 words.");
                    }
                }
            ]
        ];
    }

    public function mount($user_id)
    {
        $this->user = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.add-comment');
    }

    public function addComment()
    {
        $this->validate();

        Log::info($this->user);

        Auth::user()->comments()->create([
            'user_id' => Auth::id(),
            'receiver_id' => $this->user->id,
            'comment' => $this->comment,
            'approved' => 1
        ]);

        session()->flash('success', 'Commend added successfully.');

        $this->reset('comment');
        $this->emitUp('refreshComponent');

    }
}
