<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use App\Models\Fret;
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
        $frets = Fret::all();
        return view('chord.create',compact('frets'));
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required | max:7 ',
            'note' => 'required | max:6 | min:2 ',
            'fret_id' => 'required',
        ],
        [
            'required' => 'Vul dit veld in',
            'integer' => 'Vul alleen letters in',
            'unique' => 'Dit akkoord bestaat al',
            'name:max'=> 'Vul maximaal 7 tekens in voor de naam',
            'note:max'=> 'Er bestaan maar 6 strings',
            'min'=> 'Vul minimaal 2 noten in'
        ]);

        $chord = new Chord();
        $chord->name = $request->input('name');
        $chord->note = $request->input('note');
        $chord->user_id = 1;
        $chord->fret_id = $request->input('fret_id');
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
