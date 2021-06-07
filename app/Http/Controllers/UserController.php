<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        if (!is_null($user)) {
            if ($user->isAdmin) {
                return view('users.index',
                    ['users' => User::all()]);
            }
        }

        return view('errors.not_admin');
    }
    public function show($id) {

    }
    public function store($id) {
        //
    }

    public function edit($id) {

    }

    public function update($id) {

    }
}
