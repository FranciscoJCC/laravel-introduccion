<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Hash;

class UserController extends Controller
{
    public function index(){

        $users = User::latest()->get();

        return view('users.index',[
            'users' => $users
        ]);
    }

    public function store(StoreUserRequest $request){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return back();
    }

    public function destroy(User $user){
        
        $user->delete();

        return back();
    }
}
