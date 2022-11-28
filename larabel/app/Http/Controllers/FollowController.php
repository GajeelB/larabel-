<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function store ($id)
    {
        $user = User::find($id);
        $user->followers()->attach(Auth::user()->id);
        return back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->followers()->detach(Auth::user()->id);
        return back();
    }
}
