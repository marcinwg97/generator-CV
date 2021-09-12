<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\Edukacja;
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

    public function index() {
        $edukacja = Edukacja::where('user_id', Auth::user()->id)->get();
        return view('profile.data.edukacja.index')->with(['edukacja' => $edukacja]);
    }

    public function edit($id)
    {
        $edukacja = Edukacja::where('id', $id)->first();

        return view('profile.data.edukacja.edit')->with(['edukacja' => $edukacja]);
    }

    public function update(Request $request, $id) {
        $edukacja = Edukacja::where('id', $id)->first();
        $edukacja->szkola = $request->szkola;
        $edukacja->kierunek = $request->kierunek;
        $edukacja->poziom_wyksztalcenia = $request->poziom_wyksztalcenia;
        $edukacja->rok_od = $request->rok_od;
        $edukacja->rok_do = isset($request->uczy_sie) ? NULL : $request->rok_do;
        $edukacja->uczy_sie = isset($request->uczy_sie) ? 1 : 0;
        $edukacja->save();
        return redirect()->route( 'profile.data.edukacja.index');
    }

    public function destroy($id)
    {
        $edukacja = Edukacja::where('id', $id);
        $edukacja->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('profile.data.edukacja.create');
    }

    public function store(Request $request) {
        $edukacja = new Edukacja;
        $edukacja->user_id = Auth::user()->id;
        $edukacja->szkola = $request->szkola;
        $edukacja->kierunek = $request->kierunek;
        $edukacja->poziom_wyksztalcenia = $request->poziom_wyksztalcenia;
        $edukacja->rok_od = $request->rok_od;
        $edukacja->rok_do = isset($request->uczy_sie) ? NULL : $request->rok_do;
        $edukacja->uczy_sie = isset($request->uczy_sie) ? 1 : 0;
        $edukacja->save();

        return redirect()->route( 'profile.data.edukacja.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}