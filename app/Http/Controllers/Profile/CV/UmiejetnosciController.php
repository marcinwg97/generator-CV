<?php

namespace App\Http\Controllers\Profile\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\UmiejetnosciCV;
use App\Http\Controllers\Storage;

class UmiejetnosciController extends Controller
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
        $umiejetnosci = UmiejetnosciCV::where('cv_id', $cevi->id)->get();
        return view('profile.cv.details.umiejetnosci.index')->with(['umiejetnosci' => $umiejetnosci, 'cevi' => $cevi]);
    }

    public function edit($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $umiejetnosci = UmiejetnosciCV::where('id', $id)->first();

        return view('profile.cv.details.umiejetnosci.edit')->with(['umiejetnosci' => $umiejetnosci, 'cevi' => $cevi]);
    }

    public function update(Request $request, $cv, $id) {
        $cevi = CV::where('id', $cv)->first();
        $umiejetnosci = UmiejetnosciCV::where('id', $id)->first();
        $umiejetnosci->opis = $request->description;
        $umiejetnosci->save();
        return redirect()->route( 'profile.cv.details.umiejetnosci.index', $cevi->id);
    }

    public function destroy($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $umiejetnosci = UmiejetnosciCV::where('id', $id);
        $umiejetnosci->delete();
        return redirect()->back();
    }

    public function create($cv)
    {
        $cevi = CV::where('id', $cv)->first();
        return view('profile.cv.details.umiejetnosci.create')->with(['cevi' => $cevi]);
    }

    public function store(Request $request, $cv) {
        $cevi = CV::where('id', $cv)->first();
        $umiejetnosci = new UmiejetnosciCV;
        $umiejetnosci->user_id = Auth::user()->id;
        $umiejetnosci->opis = $request->description;
        $umiejetnosci->save();

        return redirect()->route( 'profile.cv.details.umiejetnosci.index', $cevi->id);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}