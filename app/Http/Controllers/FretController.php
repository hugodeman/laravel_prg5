<?php

namespace App\Http\Controllers;

use App\Models\frets;
use Illuminate\Http\Request;

class FretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $frets = frets::all();
//        dd($frets);
        return view('frets.index', compact('frets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fret = new Frets();
        $fret->fret = $request->input('fret');

        $fret->user_id = \Auth::user()->id;

        $fret->save();

        return redirect()->route('frets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(frets $frets)
    {
        return view('frets.show', compact('frets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(frets $frets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, frets $frets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(frets $fret)
    {
        $fret->delete();
        return redirect()->route('frets.index');
    }
}
