<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{
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

        return redirect(route('usuari.login'));


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view("usuari.usuari_edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        if (Auth::attempt(["username" => $request->get("username"), "password"=> $request->get("password")])) {
            $request->session()->regenerate();
            return redirect()->route("usuari.index");
        }
        //no login
        return back()->withErrors([
            'username' => "incorrect credentials",
        ])->onlyInput("username");
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route("usuari.login"));
    }
}
