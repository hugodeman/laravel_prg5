<?php

namespace App\Http\Controllers;

use App\Models\Chord;

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
}
