<?php

namespace App\Http\Controllers;

use App\Models\Fret;
use Illuminate\Http\Request;

class FretController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frets = Fret::all();
        return view('frets.index', compact('frets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (\Auth::user()){
            return view('frets.create');
        } else{
            return view('auth.login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fret' => 'required|unique:frets|max:22|numeric|min:0|max_digits:2',
        ],
        ['required' => 'vul dit veld in',
            'unique' => 'fret bestaat al',
            'numeric' => 'Vul een getal in',
            'max' => 'Vul een fret nummer in tussen 0 en 22',
            'min' => 'Vul een fret nummer in tussen 0 en 22',
            'max_digits' => 'vul maximaal twee getallen in'
        ]);

        $fret = new Fret();
        $fret->fret = $request->input('fret');

        $fret->save();

        return redirect()->route('frets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fret $fret)
    {
        return view('frets.show', compact('fret'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fret $fret)
    {
        if (\Auth::user()){
            $fret = Fret::all();
            return view('frets.edit', compact( 'fret'));
        } else{
            return view('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fret $fret)
    {
        $validated = $request->validate([
            'fret' => 'required|unique:frets|max:22|numeric|min:0|max_digits:2',
        ],
            ['required' => 'vul dit veld in',
                'unique' => 'fret bestaat al',
                'numeric' => 'Vul een getal in',
                'max' => 'Vul een fret nummer in tussen 0 en 22',
                'min' => 'Vul een fret nummer in tussen 0 en 22',
                'max_digits' => 'vul maximaal twee getallen in'
            ]);

        $fret->fret = $request->input('fret');
        $fret->save();

        return redirect()->route('frets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fret $fret)
    {
        $fret->delete();
        return redirect()->route('frets.index');
    }
}
