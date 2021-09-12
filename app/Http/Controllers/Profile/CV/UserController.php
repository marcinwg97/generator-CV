<?php

namespace App\Http\Controllers\Profile\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use Redirect;
use App\Http\Controllers\Storage;

class UserController extends Controller
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
        $user = CV::where('id', $cv)->first();
        return view('profile.cv.details.dane_osobowe.index')->with(['user' => $user]);
    }

    public function editUser(Request $request, $cv) {
        if($request->hasFile('zdjecie')) {
            $filenameWithExt = $request->file('zdjecie')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
            $extension = $request->file('zdjecie')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
            $path = $request->file('zdjecie')->storeAs('images', $fileNameToStore);
        } else {
            $fileNameToStore = 'photo.jpg';
        }
        $user = CV::where('id', $cv)->first();
        $user->imie = $request->imie;
        $user->zdjecie = $fileNameToStore;
        $user->nazwisko = $request->nazwisko;
        $user->telefon = $request->telefon;
        $user->miasto = $request->miasto;
        $user->kod_pocztowy = $request->kod_pocztowy;
        $user->data_ur = $request->data_ur;
        $user->save();

        return redirect()->back();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
