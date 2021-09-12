<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\Umiejetnosci;
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

    public function index() {
        $umiejetnosci = Umiejetnosci::where('user_id', Auth::user()->id)->get();
        return view('profile.data.umiejetnosci.index')->with(['umiejetnosci' => $umiejetnosci]);
    }

    public function edit($id)
    {
        $umiejetnosci = Umiejetnosci::where('id', $id)->first();

        return view('profile.data.umiejetnosci.edit')->with(['umiejetnosci' => $umiejetnosci]);
    }

    public function update(Request $request, $id) {
        $umiejetnosci = Umiejetnosci::where('id', $id)->first();
        $umiejetnosci->opis = $request->description;
        $umiejetnosci->save();
        return redirect()->route( 'profile.data.umiejetnosci.index');
    }

    public function destroy($id)
    {
        $umiejetnosci = Umiejetnosci::where('id', $id);
        $umiejetnosci->delete();
        return redirect()->back();
    }

    public function create()
    {
        return view('profile.data.umiejetnosci.create');
    }

    public function store(Request $request) {
        $umiejetnosci = new Umiejetnosci;
        $umiejetnosci->user_id = Auth::user()->id;
        $umiejetnosci->opis = $request->description;
        $umiejetnosci->save();

        return redirect()->route( 'profile.data.umiejetnosci.index');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}