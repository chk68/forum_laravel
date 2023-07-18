<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show(User $user)
    {
        return view('user', [
            'profileUser' => $user,
            'activities' => Activity::feed($user)
        ]);
    }

    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();

        return Redirect::to('/');
    }



}
