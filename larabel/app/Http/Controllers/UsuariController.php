<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only("edit", "destroy");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view("usuari.usuari_index")->with(["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view("usuari.usuari_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "username" => "required | min:4 | max: 20 | unique:users",
            "name" => "required",
            "email" => "required | min:4 | max: 25 | unique:users",
            "password" => "required  | min:4 | max: 9",
            "password_confirmation" => "required |  | min:4 | max: 9 | same:password",
        ]);

        User::create(
            [
                'name' => $request->get("name"),
                'username' => $request->get("username"),
                'email' => $request->get("email"),
                'password' => Hash::make($request->get("password")),
            ]
        );

        return redirect(route('usuaris.login'));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return mixed
     */
    public function show(User $user)
    {
        if (Auth::user()->id != $user->id) {
            return redirect()->route("usuaris.posts.index", $user->username);
        }
        return view("usuari.usuari_show")->with(["usuari" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view("usuari.usuari_edit")->with(["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "username" => "required | min:4 | max: 20 | unique:users,username," . $id . ",id",
            "email" => "required | min:4 | max: 25 | unique:users,email," . $id . ",id",
            "password" => "required  | min:4 | max: 9",
        ]);

        $user = User::find($id);
        $user->name = $request->get("name");
        $user->username = $request->get("username");
        $user->email = $request->get("email");
        $user->password = Hash::make($request->get("password"));
        $user->save();

        return view("usuaris.usuari_profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        User::destroy($id);
        return redirect()->route("usuaris.index")->with(["mensaje" => "Usuari eliminat",
        ]);
    }


    public function login()
    {
        return view("usuari.usuari_login");
    }

    public function singin(Request $request)
    {
        $request->validate([
            'username' => "required",
            'password' => "required",
        ]);

        if (Auth::attempt(["username" => $request->get("username"), "password" => $request->get("password")])) {
            $request->session()->regenerate();
            return redirect()->route("usuaris.show", [Auth::user()->username]);
        }
        //no login
        return back()->withErrors([
            'username' => "incorrect credentials",
        ])->onlyInput("username");
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route("usuaris.login"));
    }
}
