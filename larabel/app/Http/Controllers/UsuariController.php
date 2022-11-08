<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariController extends Controller
{
    public function logup() {
        return view('usuari.usuari_create');
    }

    public function login() {
        return view('usuari.usuari_login');
    }

    public function index() {
        return view('usuari.usuari_index');
    }
}
