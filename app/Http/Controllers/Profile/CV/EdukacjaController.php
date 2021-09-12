<?php

namespace App\Http\Controllers\Profile\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\EdukacjaCV;
use App\Http\Controllers\Storage;

class EdukacjaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index($cv) {
        $cevi = CV::where('id', $cv)->first();
        $edukacja = EdukacjaCV::where('cv_id', $cevi->id)->get();
        return view('profile.cv.details.edukacja.index')->with(['edukacja' => $edukacja, 'cevi' => $cevi]);
    }

    public function edit($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $edukacja = EdukacjaCV::where('id', $id)->first();

        return view('profile.cv.details.edukacja.edit')->with(['edukacja' => $edukacja, 'cevi' => $cevi]);
    }

    public function update(Request $request, $cv, $id) {
        $cevi = CV::where('id', $cv)->first();
        $edukacja = EdukacjaCV::where('id', $id)->first();
        $edukacja->szkola = $request->szkola;
        $edukacja->kierunek = $request->kierunek;
        $edukacja->poziom_wyksztalcenia = $request->poziom_wyksztalcenia;
        $edukacja->rok_od = $request->rok_od;
        $edukacja->rok_do = isset($request->uczy_sie) ? NULL : $request->rok_do;
        $edukacja->uczy_sie = isset($request->uczy_sie) ? 1 : 0;
        $edukacja->save();
        return redirect()->route( 'profile.cv.details.edukacja.index', $cevi->id);
    }

    public function destroy($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $edukacja = EdukacjaCV::where('id', $id);
        $edukacja->delete();
        return redirect()->back();
    }

    public function create($cv)
    {
        $cevi = CV::where('id', $cv)->first();
        return view('profile.cv.details.edukacja.create')->with(['cevi' => $cevi]);
    }

    public function store(Request $request, $cv) {
        $cevi = CV::where('id', $cv)->first();
        $edukacja = new EdukacjaCV;
        $edukacja->user_id = Auth::user()->id;
        $edukacja->szkola = $request->szkola;
        $edukacja->kierunek = $request->kierunek;
        $edukacja->poziom_wyksztalcenia = $request->poziom_wyksztalcenia;
        $edukacja->rok_od = $request->rok_od;
        $edukacja->rok_do = isset($request->uczy_sie) ? NULL : $request->rok_do;
        $edukacja->uczy_sie = isset($request->uczy_sie) ? 1 : 0;
        $edukacja->save();

        return redirect()->route( 'profile.cv.details.edukacja.index', $cevi->id);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}