<?php

namespace App\Http\Controllers\Profile\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\DoswiadczenieCV;
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

    public function index($cv) {
        $cevi = CV::where('id', $cv)->first();
        $doswiadczenie = DoswiadczenieCV::where('cv_id', $cevi->id)->get();
        return view('profile.cv.details.doswiadczenie.index')->with(['doswiadczenie' => $doswiadczenie, 'cevi' => $cevi]);
    }

    public function edit($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $doswiadczenie = DoswiadczenieCV::where('id', $id)->first();

        return view('profile.cv.details.doswiadczenie.edit')->with(['doswiadczenie' => $doswiadczenie, 'cevi' => $cevi]);
    }

    public function update(Request $request, $cv, $id) {
        $cevi = CV::where('id', $cv)->first();
        $zainteresowania = DoswiadczenieCV::where('id', $id)->first();
        $zainteresowania->nazwa_stanowiska = $request->nazwa_stanowiska;
        $zainteresowania->miejsce = $request->miejsce;
        $zainteresowania->opis = $request->description;
        $zainteresowania->rok_od = $request->rok_od;
        $zainteresowania->rok_do = isset($request->biezaca) ? NULL : $request->rok_do;
        $zainteresowania->biezaca = isset($request->biezaca) ? 1 : 0;
        $zainteresowania->save();
        return redirect()->route( 'profile.cv.details.doswiadczenie.index', $cevi->id);
    }

    public function destroy($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $doswiadczenie = DoswiadczenieCV::where('id', $id);
        $doswiadczenie->delete();
        return redirect()->back();
    }

    public function create($cv)
    {
        $cevi = CV::where('id', $cv)->first();
        return view('profile.cv.details.doswiadczenie.create')->with(['cevi' => $cevi]);
    }

    public function store(Request $request, $cv) {
        $cevi = CV::where('id', $cv)->first();
        $zainteresowania = new DoswiadczenieCV;
        $zainteresowania->user_id = Auth::user()->id;
        $zainteresowania->nazwa_stanowiska = $request->nazwa_stanowiska;
        $zainteresowania->miejsce = $request->miejsce;
        $zainteresowania->opis = $request->description;
        $zainteresowania->rok_od = $request->rok_od;
        $zainteresowania->rok_do = isset($request->biezaca) ? NULL : $request->rok_do;
        $zainteresowania->biezaca = isset($request->biezaca) ? 1 : 0;
        $zainteresowania->save();

        return redirect()->route( 'profile.cv.details.doswiadczenie.index', $cevi->id);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}