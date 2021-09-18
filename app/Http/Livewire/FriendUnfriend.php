<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;


class FriendUnfriend extends Component
{
    public $user;
    public $find_user_id;

    protected $listeners = [
        'confirmed'
    ];

    public function mount($user_id)
    {
        $this->user = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.friend-unfriend')->with(['user' => $this->user]);
    }

    public function addFriend($id)
    {
        $find_user = User::findorFail($id);
        Auth::user()->befriend($find_user);

        //accept the friend
        $find_user->acceptFriendRequest(Auth::user());

        $this->alert('success', 'Friend Added!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);


    }

    public function removeFriend($id)
    {
        $this->find_user_id = $id;
        $find_user = User::findorFail($this->find_user_id);

        $this->confirm('Do you want to remove friend!', [
            'position' =>  'center',
            'timer' =>  false,
            'toast' =>  false,
            'text' =>  '',
            'showCancelButton' => true,
            'showConfirmButton' =>  true,
            'confirmButtonText' =>  'Yes, Remove '. $find_user->name,
            'cancelButtonText' =>  "No, don'tl!",
            'reverseButtons' =>  true,
            'onConfirmed' => 'confirmed',
        ]);


    }

    public function confirmed()
    {
        $find_user = User::findorFail($this->find_user_id);
        Auth::user()->unfriend($find_user);

        $this->alert(
            'success',
            'Removed Friend!'
        );


    }

}
