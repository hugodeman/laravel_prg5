<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        foreach ($users as $user) {
            $user->chordCount = Chord::where('user_id', $user->id)->count();
        }
        return view('users.index', compact('users'));
    }

//    public function store(Request $request){
//
//    }

    public function update(Request $request, User $user){
        if($user->active){
            $user->active = false;
        } else{
            $user->active = true;
        }

        $user->save();
        return redirect()->route('users.index');
    }

    public function edit($id){

    }

    public function destroy(User $user){
        $userChords = User::find($user->id);
        $chords = $userChords->chord();
        $chords->delete();

        $user ->delete();
        return redirect()->route('users.index');
    }
}
