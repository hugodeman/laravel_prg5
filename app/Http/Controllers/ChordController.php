<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ChordController extends Controller
{
    public function index(){
        $chords = Chord::all();
        return view('chord.index',compact('chords'));
    }

    public function show($id){
        $chord = Chord::find($id);
        return view('chord.show',compact('chord'));
    }

    public function create()
    {
        return view('chord.create');
    }

    public function store(Request $request){
        $chord = new Chord();
        $chord->name = $request->input('name');
        $chord->note = $request->input('note');
        $chord->user_id = 1;
        $chord->frets_id = 0;
        $chord->save();

        return redirect()->route('chords.index');
    }

    public function update(Request $request,$id)
    {
//        return view('chord.create');
    }

    public function edit($id)
    {

    }

    public function destroy($id){

    }
}
