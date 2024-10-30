<?php

namespace App\Http\Controllers;

use App\Models\Chord;
use App\Models\Fret;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\Auth::user()->is_admin){
            $chords = Chord::all();
            return view('admin.index',compact('chords'));
        } else {
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
//    public function create()
//    {
//        $frets = Fret::all();
//        return view('admin.create',compact('frets'));
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        $validation = $request->validate([
//            'name' => 'required | max:7 ',
//            'note' => 'required | max:6 | min:2 ',
//            'fret_id' => 'required',
//        ],
//            [
//                'required' => 'Vul dit veld in',
//                'integer' => 'Vul alleen letters in',
//                'unique' => 'Dit akkoord bestaat al',
//                'name:max'=> 'Vul maximaal 7 tekens in voor de naam',
//                'note:max'=> 'Er bestaan maar 6 strings',
//                'min'=> 'Vul minimaal 2 noten in'
//            ]);
//
//        $chord = new Chord();
//        $chord->name = $request->input('name');
//        $chord->note = $request->input('note');
//        $chord->user_id = \Auth::user()->id;
//        $chord->fret_id = $request->input('fret_id');
//        $chord->save();
//
//        return redirect()->route('admin.index');
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Chord $chord)
//    {
//        $chords = Chord::all();
//        $frets = Fret::all();
//        return view('admin.show',compact('chords','frets'));
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     */
//    public function edit(Chord $chord)
//    {
//        $frets = Fret::all();
//        return view('admin.edit',compact('chord', 'frets'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $request, Chord $chord)
//    {
//        $validation = $request->validate([
//            'name' => 'required | max:7 ',
//            'note' => 'required | max:6 | min:2 ',
//            'fret_id' => 'required',
//        ],
//            [
//                'required' => 'Vul dit veld in',
//                'integer' => 'Vul alleen letters in',
//                'unique' => 'Dit akkoord bestaat al',
//                'name:max'=> 'Vul maximaal 7 tekens in voor de naam',
//                'note:max'=> 'Er bestaan maar 6 strings',
//                'min'=> 'Vul minimaal 2 noten in'
//            ]);
//
//        $chord->name = $request->input('name');
//        $chord->note = $request->input('note');
//        $chord->fret_id = $request->input('fret_id');
//        $chord->save();
//
//        return redirect()->route('admin.index');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Chord $chord)
//    {
//        $chord->delete();
//        return redirect()->route('admin.index');
//    }
}
