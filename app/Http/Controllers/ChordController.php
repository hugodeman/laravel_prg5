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

        $chordUser = Chord::where('user_id', \Auth::user()->id)->get();
        $chordCount = $chordUser->count();
        return view('chord.index',compact('chords', 'chordCount'));
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
        $chord->user_id = \Auth::user()->id;
        $chord->fret_id = $request->input('fret_id');
        $chord->save();

        return redirect()->route('chords.index');
    }

    public function edit(Chord $chord)
    {
        $frets = Fret::all();
        return view('chord.edit',compact('chord', 'frets'));
    }

    public function update(Request $request, Chord $chord)
    {
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

        $chord->name = $request->input('name');
        $chord->note = $request->input('note');
        $chord->fret_id = $request->input('fret_id');
        $chord->save();

        return redirect()->route('chords.index');
    }

    public function updateStatus(Chord $chord){
        if ($chord->status){
            $chord->status = false;
        } else{
            $chord->status = true;
        }
        $chord->save();
        return redirect()->route('chords.index');
    }

    public function destroy(Chord $chord){
        $chord->delete();
        return redirect()->route('chords.index');
    }
}
