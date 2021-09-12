<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\Zainteresowania;
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

    public function index() {
        $zainteresowania = Zainteresowania::where('user_id', Auth::user()->id)->get();
        return view('profile.data.zainteresowania.index')->with(['zainteresowania' => $zainteresowania]);
    }

    public function edit($id)
    {
        $zainteresowania = Zainteresowania::where('id', $id)->first();

        return view('profile.data.zainteresowania.edit')->with(['zainteresowania' => $zainteresowania]);
    }

    public function update(Request $request, $id) {
        $zainteresowania = Zainteresowania::where('id', $id)->first();
        $zainteresowania->opis = $request->description;
        $zainteresowania->save();
        return redirect()->route( 'profile.data.zainteresowania.index');
    }

    public function destroy($id)
    {
        $zainteresowania = Zainteresowania::where('id', $id);
        $zainteresowania->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('profile.data.zainteresowania.create');
    }

    public function store(Request $request) {
        $zainteresowania = new Zainteresowania;
        $zainteresowania->user_id = Auth::user()->id;
        $zainteresowania->opis = $request->description;
        $zainteresowania->save();

        return redirect()->route( 'profile.data.zainteresowania.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
