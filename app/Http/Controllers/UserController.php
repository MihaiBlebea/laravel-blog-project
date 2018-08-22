<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Models\{
    User,
    Category,
    Profile
};


class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        return view('admin.dashboard')->with('user', $user);
    }

    public function profile(User $user = null)
    {
        if(!isset($user))
        {
            $user = auth()->user();
        }
        return view('user.profile')->with([
            'user'     => $user,
            'posts'    => $user->posts()->paginate(3),
            'projects' => $user->projects->groupBy('language')
        ]);
    }

    public function users()
    {
        if(auth()->check())
        {
            $users = User::where('id', '!=', auth()->user()->id)->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('user.users')->with('users', $users);
    }

    public function manageUsers()
    {
        $users = User::where('id', '!=', auth()->user()->id)->paginate(10);
        return view('admin.users')->with('users', $users);
    }

    public function getUpdate()
    {
        $user = auth()->user();
        return view('admin.update')->with('user', $user);
    }

    public function postUpdate(ProfileRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
        ]);

        Profile::updateOrCreate([
            'user_id' => $user->id
        ], [
            'short_description' => $request->input('short_description'),
            'description'       => $request->input('description'),
            'image_id'          => $request->input('profile_image'),
        ]);

        return redirect()->back()->with([
            'message'     => 'Your profile was updated',
            'alert_class' => 'success'
        ]);
    }
}
