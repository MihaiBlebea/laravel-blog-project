<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Subscription;
use App\Models\Profile;
use Session;
use Storage;

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
        return view('user.profile')->with('user', $user);
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

    public function postUpdate(Request $request)
    {
        $user = auth()->user();
        if($request->file('profile_image'))
        {
            $path = Storage::disk('public_upload')->put('profile_image', $request->file('profile_image'));
            if(!$path)
            {
                throw new \Exception('The profile image could not be saved to storage' , 1);
            };
        }

        $user->update([
            'first_name'    => $request->input('first_name'),
            'last_name'     => $request->input('last_name'),
            'email'         => $request->input('email'),
            'password'      => $request->input('password')
        ]);

        Profile::updateOrCreate([
            'user_id' => $user->id
        ], [
            'short_description' => $request->input('short_description'),
            'description'       => $request->input('description'),
            'profile_image'     => isset($path) ? $path : null
        ]);

        return redirect()->back();
    }

    public function subscribe(User $user)
    {
        Subscription::create([
            'user_id'      => auth()->user()->id,
            'subscribe_to' => $user->id
        ]);

        return redirect()->back();
    }

    public function unsubscribe(User $user)
    {
        $subscription = auth()->user()->subscriptions()->where('subscribe_to', $user->id)->first();
        $subscription->delete();
        return redirect()->back();
    }

    public function getSubscriptions(User $user = null)
    {
        if(!isset($user))
        {
            $user = auth()->user();
        }
        $subscriptions = $user->subscriptions()->paginate(10);
        return view('admin.subscriptions')->with('subscriptions', $subscriptions);
    }
}
