<?php

namespace App\Http\Controllers\CV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\CV;
use App\Http\Controllers\Storage;

class CvController extends Controller
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

    public function getCv() {
        $cv = CV::where('user_id', Auth::user()->id)->get();
        return view('profile.cv.index')->with(['cv' => $cv]);
    }

    public function getCvId($id) {
        $cv_position = CV::where('id', $id)->first();
        return view('profile.cv.details')->with(['cv_position' => $cv_position]);
    }

   /* public function import() {
        $cv = CV::where('user_id', Auth::user()->id)->get();
        foreach($cv as $cvs) {
            $civi = new CV;
            $civi->user_id = 7;
            $civi->email = $cvs->email;
            $civi->nazwisko = $cvs->nazwisko;
            $civi->data_ur = $cvs->data_ur;
            $civi->telefon = $cvs->telefon;
            $civi->miasto = $cvs->miasto;
            $civi->kod_pocztowy = $cvs->kod_pocztowy;
            $civi->zdjecie = $cvs->zdjecie;
            $civi->save();

            $doswiadczenie = DoswiadczenieCV::where('cv_id', $cvs->id)->get();

            foreach($doswiadczenie as $doswiadczenies) {
                $dosw = new DoswiadczenieCV;
                $dosw->user_id = 7;
                $dosw->cv_id = $civi->id;
                $dosw->nazwa_stanowiska = $doswiadczenies->nazwa_stanowiska;
                $dosw->miejsce = $doswiadczenies->miejsce;
                $dosw->opis = $doswiadczenies->opis;
                $dosw->rok_od = $doswiadczenies->rok_od;
                $dosw->rok_do = $doswiadczenies->rok_do;
                $dosw->biezaca = $doswiadczenies->biezaca;
            }

            $edukacja = EdukacjaCV::where('cv_id', $cvs->id)->get();

            foreach($edukacja as $edukacjas) {
                $eduk = new EdukacjaCV;
                $eduk->user_id = 7;
                $eduk->cv_id = $civi->id;
                $eduk->szkola = $edukacjas->szkola;
                $eduk->kierunek = $edukacjas->kierunek;
                $eduk->poziom_wyksztalcenia = $edukacjas->poziom_wyksztalcenia;
                $eduk->rok_od = $edukacjas->rok_od;
                $eduk->rok_do = $edukacjas->rok_do;
                $eduk->uczy_sie = $edukacjas->uczy_sie; 
            }

            $umiejetnosci = UmiejetnosciCV::where('cv_id', $cvs->id)->get();

            foreach($umiejetnosci as $umiejetnoscis) {
                $um = new UmiejetnosciCV;
                $um->user_id = 7;
                $um->cv_id = $civi->id;
                $um->opis = $umiejetnoscis->opis;
            }

            $jezyki_obce = UserJezykiObceCV::where('cv_id', $cvs->id)->get();

            foreach($jezyki_obce as $jezyki_obces) {
                $jo = new UserJezykiObceCV;
                $jo->user_id = 7;
                $jo->cv_id = $civi->id;
                $jo->jezyki_obce_id = $jezyki_obces->jezyki_obce_id;
            }

            $zainteresowania = ZainteresowaniaCV::where('cv_id', $cvs->id)->get();  
            
            foreach($zainteresowania as $zainteresowanias) {
                $zaint = new ZainteresowaniaCV;
                $zaint->user_id = 7;
                $zaint->cv_id = $civi->id;
                $zaint->opis = $zainteresowanias->opis;
            }
        }
        return redirect()->back();
    } */


    public function __construct()
    {
        $this->middleware('auth');
    }
}