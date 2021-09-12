<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\Doswiadczenie;
use App\Http\Controllers\Storage;

class DoswiadczenieController extends Controller
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
        $doswiadczenie = Doswiadczenie::where('user_id', Auth::user()->id)->get();
        return view('profile.data.doswiadczenie.index')->with(['doswiadczenie' => $doswiadczenie]);
    }

    public function edit($id)
    {
        $doswiadczenie = Doswiadczenie::where('id', $id)->first();

        return view('profile.data.doswiadczenie.edit')->with(['doswiadczenie' => $doswiadczenie]);
    }

    public function update(Request $request, $id) {
        $zainteresowania = Doswiadczenie::where('id', $id)->first();
        $zainteresowania->nazwa_stanowiska = $request->nazwa_stanowiska;
        $zainteresowania->miejsce = $request->miejsce;
        $zainteresowania->opis = $request->description;
        $zainteresowania->rok_od = $request->rok_od;
        $zainteresowania->rok_do = isset($request->biezaca) ? NULL : $request->rok_do;
        $zainteresowania->biezaca = isset($request->biezaca) ? 1 : 0;
        $zainteresowania->save();
        return redirect()->route( 'profile.data.doswiadczenie.index');
    }

    public function destroy($id)
    {
        $doswiadczenie = Doswiadczenie::where('id', $id);
        $doswiadczenie->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('profile.data.doswiadczenie.create');
    }

    public function store(Request $request) {
        $zainteresowania = new Doswiadczenie;
        $zainteresowania->user_id = Auth::user()->id;
        $zainteresowania->nazwa_stanowiska = $request->nazwa_stanowiska;
        $zainteresowania->miejsce = $request->miejsce;
        $zainteresowania->opis = $request->description;
        $zainteresowania->rok_od = $request->rok_od;
        $zainteresowania->rok_do = isset($request->biezaca) ? NULL : $request->rok_do;
        $zainteresowania->biezaca = isset($request->biezaca) ? 1 : 0;
        $zainteresowania->save();

        return redirect()->route( 'profile.data.doswiadczenie.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}