<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use App\Models\Fret;
use App\Models\Tag;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class ChordController extends Controller
{
    public function index(){
        $chords = Chord::latest()->get();
        $tags = Tag::all();

        if(!\Auth::check()){
            return view('chord.index', compact('chords', 'tags'));
        }

        $chordUser = Chord::where('user_id', \Auth::user()->id)->get();
        $chordCount = $chordUser->count();

        return view('chord.index', compact('chords', 'tags', 'chordUser', 'chordCount'));
    }

    public function show($id){
        $chord = Chord::find($id);

        return view('chord.show',compact('chord'));
    }

    public function create()
    {
        if (\Auth::user()){
        $frets = Fret::all();
        $tags = Tag::all();
        return view('chord.create', compact('frets','tags'));
        } else{
            return view('auth.login');
        }
    }

    public function store(Request $request){
        $validation = $request->validate([
            'name' => 'required | max:7 ',
            'note' => 'required | max:12 | min:2 ',
            'fret_id' => 'required',
            'tag' => 'required'
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

//        $chord->tags()->attach($request->input('tag-type'));
        $chord->tags()->sync($request->input('tag'));

        return redirect()->route('chords.index');
    }

    public function edit(Chord $chord)
    {
        if (\Auth::user() && $chord->user_id == \Auth::user()->id){
            $frets = Fret::all();
            $tags = Tag::all();
            return view('chord.edit', compact('chord', 'frets', 'tags'));
        } else{
            return view('auth.login');
        }
    }

    public function update(Request $request, Chord $chord)
    {
        $validation = $request->validate([
            'name' => 'required | max:7 ',
            'note' => 'required | max:6 | min:2 ',
            'fret_id' => 'required',
            'tag' => 'required'
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

        $chord->tags()->sync($request->input('tag'));

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
