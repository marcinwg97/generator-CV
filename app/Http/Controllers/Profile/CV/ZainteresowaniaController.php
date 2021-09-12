<?php

namespace App\Http\Controllers\Profile\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\ZainteresowaniaCV;
use App\Http\Controllers\Storage;

class ZainteresowaniaController extends Controller
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
        $zainteresowania = ZainteresowaniaCV::where('cv_id', $cevi->id)->get();
        return view('profile.cv.details.zainteresowania.index')->with(['zainteresowania' => $zainteresowania, 'cevi' => $cevi]);
    }

    public function edit($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $zainteresowania = ZainteresowaniaCV::where('id', $id)->first();

        return view('profile.cv.details.zainteresowania.edit')->with(['zainteresowania' => $zainteresowania, 'cevi' => $cevi]);
    }

    public function update(Request $request, $cv, $id) {
        $cevi = CV::where('id', $cv)->first();
        $zainteresowania = ZainteresowaniaCV::where('id', $id)->first();
        $zainteresowania->cv_id = $cevi->id;
        $zainteresowania->opis = $request->description;
        $zainteresowania->save();
        return redirect()->route('profile.cv.details.zainteresowania.index', $cevi->id);
    }

    public function destroy($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $zainteresowania = ZainteresowaniaCV::where('id', $id);
        $zainteresowania->delete();
        return redirect()->back();
    }

    public function create($cv)
    {
        $cevi = CV::where('id', $cv)->first();
        return view('profile.cv.details.zainteresowania.create')->with(['cevi' => $cevi]);
    }

    public function store(Request $request, $cv) {
        $cevi = CV::where('id', $cv)->first();
        $zainteresowania = new ZainteresowaniaCV;
        $zainteresowania->user_id = Auth::user()->id;
        $zainteresowania->cv_id = $cevi->id;
        $zainteresowania->opis = $request->description;
        $zainteresowania->save();

        return redirect()->route('profile.cv.details.zainteresowania.index', $cevi->id);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
