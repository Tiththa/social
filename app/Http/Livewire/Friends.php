<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;
use Livewire\WithPagination;
use Log;


class Friends extends Component
{
    use WithPagination;


    public $find_user_id;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'confirmed',
        'refreshComponent' => '$refresh'
    ];

    public function render()
    {
        $user = Auth::user();

        $this->friends = $user->getAcceptedFriendships()->load('recipient');

        $this->users = User::whereKeyNot(Auth::id())
                        ->whereNull('user_type')
                        ->latest()
                        ->paginate(10);


        return view('livewire.friends')->with(['users' => $this->users,'friends' => $this->friends]);
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

        if(Auth::user()->isFriendWith($find_user))
        {
            Auth::user()->unfriend($find_user);
        }
        else {
            $find_user->unfriend(Auth::user());
        }

        $this->alert(
            'success',
            'Removed Friend!'
        );
    }
}
