<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function allUsers()
    {
        $users = User::whereKeyNot(Auth::id())->paginate(10);

        return view('Admin.allUsers')->with(['users' => $users]);
    }

    public function editUser($id)
    {
        $user = User::find($id);

        return view('Admin.editUser')->with(['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'dob' => 'nullable|date|before:today',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($validator->passes())
        {
            $user = User::find($id);

            $user->update([
                'dob' => $request->dob,
                'location' => $request->location,
                'description' => $request->description
            ]);

            return redirect()->route('admin.users')->with(['success' => 'User updated successfully!']);
        }

        return back()->withErrors($validator)->withInput();


    }
}
