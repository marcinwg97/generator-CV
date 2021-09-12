<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\UserJezykiObce;
use App\JezykiObce;
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

    public function index() {
        $jezyki_obce_user = UserJezykiObce::where('user_id', Auth::user()->id)->with('jezyki_obce')->get();
        return view('profile.data.jezyki_obce.index')->with(['jezyki_obce_user' => $jezyki_obce_user]);
    }

    public function edit($id)
    {
        $jezyki_obce_user =  UserJezykiObce::where('id', $id)->first();
        $jezyki_obce = JezykiObce::all();

        return view('profile.data.jezyki_obce.edit')->with(['jezyki_obce' => $jezyki_obce, 'jezyki_obce_user' => $jezyki_obce_user]);
    }

    public function update(Request $request, $id) {
        $jezyki_obce_user =  UserJezykiObce::where('id', $id)->first();
        $jezyki_obce_user->jezyki_obce_id = $request->language;
        $jezyki_obce_user->save();
        return redirect()->route( 'profile.data.jezyki_obce.index');
    }

    public function destroy($id)
    {
        $jezyki_obce_user =  UserJezykiObce::where('id', $id);
        $jezyki_obce_user->delete();
        return redirect()->back();
    }

    public function create()
    {
        $jezyki_obce = JezykiObce::all();
        return view('profile.data.jezyki_obce.create')->with(['jezyki_obce' => $jezyki_obce]);
    }

    public function store(Request $request) {
        $jezyki_obce_user = new UserJezykiObce;
        $jezyki_obce_user->user_id = Auth::user()->id;
        $jezyki_obce_user->jezyki_obce_id = $request->language;
        $jezyki_obce_user->save();

        return redirect()->route( 'profile.data.jezyki_obce.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}