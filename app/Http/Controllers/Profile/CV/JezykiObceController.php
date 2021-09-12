<?php

namespace App\Http\Controllers\Profile\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\JezykiObce;
use App\UserJezykiObceCV;
use App\Http\Controllers\Storage;

class JezykiObceController extends Controller
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
        $jezyki_obce_user = UserJezykiObceCV::where('cv_id', $cevi->id)->with('jezyki_obce_cv')->get();
        return view('profile.cv.details.jezyki_obce.index')->with(['jezyki_obce_user' => $jezyki_obce_user, 'cevi' => $cevi]);
    }

    public function edit($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $jezyki_obce_user =  UserJezykiObceCV::where('id', $id)->first();
        $jezyki_obce = JezykiObce::all();

        return view('profile.cv.details.jezyki_obce.edit')->with(['jezyki_obce' => $jezyki_obce, 'jezyki_obce_user' => $jezyki_obce_user, 'cevi' => $cevi]);
    }

    public function update(Request $request, $cv, $id) {
        $cevi = CV::where('id', $cv)->first();
        $jezyki_obce_user =  UserJezykiObceCV::where('id', $id)->first();
        $jezyki_obce_user->jezyki_obce_id = $request->language;
        $jezyki_obce_user->save();
        return redirect()->route( 'profile.cv.details.jezyki_obce.index', $cevi->id);
    }

    public function destroy($cv, $id)
    {
        $cevi = CV::where('id', $cv)->first();
        $jezyki_obce_user =  UserJezykiObceCV::where('id', $id);
        $jezyki_obce_user->delete();
        return redirect()->back();
    }

    public function create($cv)
    {
        $cevi = CV::where('id', $cv)->first();
        $jezyki_obce = JezykiObce::all();
        return view('profile.cv.details.jezyki_obce.create')->with(['jezyki_obce' => $jezyki_obce, 'cevi' => $cevi]);
    }

    public function store(Request $request, $cv) {
        $cevi = CV::where('id', $cv)->first();
        $jezyki_obce_user = new UserJezykiObceCV;
        $$jezyki_obce_user->user_id = Auth::user()->id;
        $jezyki_obce_user->jezyki_obce_id = $request->language;
        $zainteresowania->save();

        return redirect()->route( 'profile.cv.details.jezyki_obce.index', $cevi->id);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}