<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use PDF;
use Barryvdh\Snappy;
use DB;
use App\ZainteresowaniaCV;
use App\Edukacja;
use App\Zainteresowania;
use App\EdukacjaCV;
use App\Doswiadczenie;
use App\DoswiadczenieCV;
use App\Umiejetnosci;
use App\UmiejetnosciCV;
use App\Wyksztalcenie;
use App\WyksztalcenieCV;
use App\UserJezykiObce;
use App\UserJezykiObceCV;
use App\CV;
use App\JezykiObce;
use MultipleIterator;
use App\Http\Controllers\Storage;

class HomeController extends Controller
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
    public function index()
    {
        if(Auth::user()) {
        $languages = DB::table('jezyki_obce')->get();
        $user = User::where('id', Auth::user()->id)->first();
        $zainteresowania = DB::table('zainteresowania')->where('user_id', Auth::user()->id)->get();
        return view('main.home_auth')->with(['user' => $user,'languages' => $languages, 'zainteresowania' => $zainteresowania]);
        }
        else {
        $languages = DB::table('jezyki_obce')->get();    
        return view('main.home_noauth')->with(['languages' => $languages]);
        }
    }

    public function profile() {
        return view('profile.index');
    }

    public function storeData(Request $request) {
        if(Auth::user()) {

            $user1 = User::where('id', Auth::user()->id)->get();
            $edukacja1 = Edukacja::where('user_id', Auth::user()->id)->get();
            $doswiadczenie1 = Doswiadczenie::where('user_id', Auth::user()->id)->get();
            $jezyki_obce1 = UserJezykiObce::where('user_id', Auth::user()->id)->with('jezyki_obce')->get();
            $zainteresowania1 = Zainteresowania::where('user_id', Auth::user()->id)->get();
            $umiejetnosci1 = Umiejetnosci::where('user_id', Auth::user()->id)->get();

            $zainteresowania = [];
                foreach($zainteresowania1 as $zainteresowanias)
                {
                    $zainteresowania[] = ['opis' => $zainteresowanias->opis];
                }
                $umiejetnosci = [];
                foreach($umiejetnosci1 as $umiejetnoscis)
                {
                    $umiejetnosci[] = ['opis' => $umiejetnoscis->opis];
                }
                $jezyki_obce = [];
                foreach($jezyki_obce1 as $jezyki_obces)
                {
                    $jezyki_obce[] = [
                        'jezyk' => $jezyki_obces->jezyki_obce->jezyk,
                        'poziom' => $jezyki_obces->jezyki_obce->poziom,
                ];
                }
                $edukacja = [];
                foreach ($edukacja1 as $edukacjas) {
                    $edukacja[] = [
                        'szkola' => $edukacjas->szkola, 
                        'kierunek' => $edukacjas->kierunek,
                        'poziom_wyksztalcenia' => $edukacjas->poziom_wyksztalcenia,
                        'rok_od_e' => $edukacjas->rok_od,
                        'rok_do_e' => $edukacjas->rok_do,
                        'uczy_sie' => $edukacjas->uczy_sie,
                    ];
                }
                $doswiadczenie = [];
                foreach ($doswiadczenie1 as $doswiadczenies) {
                    $doswiadczenie[] = [
                        'nazwa_stanowiska' => $doswiadczenies->nazwa_stanowiska, 
                        'miejsce' => $doswiadczenies->miejsce,
                        'description' => $doswiadczenies->opis,
                        'rok_od_d' => $doswiadczenies->rok_od,
                        'rok_do_d' => $doswiadczenies->rok_do,
                        'biezaca' => $doswiadczenies->biezaca,
                    ];
                }
                $user = [];
                foreach ($user1 as $users) {
                $user[] = [
                    'name' => $users->name, 
                    'nazwisko' => $users->nazwisko,
                    'telefon' => $users->telefon,
                    'miasto' => $users->miasto,
                    'kod_pocztowy' => $users->kod_pocztowy,
                    'data_ur' => $users->data_ur,
                    'zdjecie' => $users->zdjecie,
                ];
                }

            $fields = $request->szablon;
            $color = $request->color;
            if($fields == '1') {
                $pdf = PDF::loadView('cv.pdf', compact('user', 'edukacja', 'jezyki_obce', 'zainteresowania', 'umiejetnosci', 'doswiadczenie', 'color'));
            }
            elseif($fields == '2') {
                $pdf = PDF::loadView('cv.pdf2', compact('user', 'edukacja', 'jezyki_obce', 'zainteresowania', 'umiejetnosci', 'doswiadczenie', 'color'));
            }   
            else {
                $pdf = PDF::loadView('cv.pdf3', compact('user', 'edukacja', 'jezyki_obce', 'zainteresowania', 'umiejetnosci', 'doswiadczenie', 'color'));
            } 

            foreach($user1 as $cvs) {
                $civi = new CV;
                $civi->user_id = Auth::user()->id;
                $civi->email = $cvs->email;
                $civi->nazwisko = $cvs->nazwisko;
                $civi->data_ur = $cvs->data_ur;
                $civi->telefon = $cvs->telefon;
                $civi->miasto = $cvs->miasto;
                $civi->kod_pocztowy = $cvs->kod_pocztowy;
                if(empty($cvs->zdjecie)) {
                    $civi->zdjecie = 'photo.jpg';
                }
                else {
                    $civi->zdjecie = $cvs->zdjecie;
                }
                $civi->imie = $cvs->name;
                $civi->szablon = $fields;
                $civi->kolor = $color;
                $civi->save();
    
                foreach($doswiadczenie1 as $doswiadczenies) {
                    $dosw = new DoswiadczenieCV;
                    $dosw->user_id = Auth::user()->id;
                    $dosw->cv_id = $civi->id;
                    $dosw->nazwa_stanowiska = $doswiadczenies->nazwa_stanowiska;
                    $dosw->miejsce = $doswiadczenies->miejsce;
                    $dosw->opis = $doswiadczenies->opis;
                    $dosw->rok_od = $doswiadczenies->rok_od;
                    $dosw->rok_do = $doswiadczenies->rok_do;
                    $dosw->biezaca = $doswiadczenies->biezaca;
                    $dosw->save();
                }
    
                foreach($edukacja1 as $edukacjas) {
                    $eduk = new EdukacjaCV;
                    $eduk->user_id = Auth::user()->id;
                    $eduk->cv_id = $civi->id;
                    $eduk->szkola = $edukacjas->szkola;
                    $eduk->kierunek = $edukacjas->kierunek;
                    $eduk->poziom_wyksztalcenia = $edukacjas->poziom_wyksztalcenia;
                    $eduk->rok_od = $edukacjas->rok_od;
                    $eduk->rok_do = $edukacjas->rok_do;
                    $eduk->uczy_sie = $edukacjas->uczy_sie; 
                    $eduk->save();
                }
    
                foreach($umiejetnosci1 as $umiejetnoscis) {
                    $um = new UmiejetnosciCV;
                    $um->user_id = Auth::user()->id;
                    $um->cv_id = $civi->id;
                    $um->opis = $umiejetnoscis->opis;
                    $um->save();
                }
    
                foreach($jezyki_obce1 as $jezyki_obces) {
                    $jo = new UserJezykiObceCV;
                    $jo->user_id = Auth::user()->id;
                    $jo->cv_id = $civi->id;
                    $jo->jezyki_obce_id = $jezyki_obces->jezyki_obce_id;
                    $jo->save();
                }
                
                foreach($zainteresowania1 as $zainteresowanias) {
                    $zaint = new ZainteresowaniaCV;
                    $zaint->user_id = Auth::user()->id;
                    $zaint->cv_id = $civi->id;
                    $zaint->opis = $zainteresowanias->opis;
                    $zaint->save();
                }
            }
        }
        else {

            if($request->hasFile('zdjecie')) {
                $filenameWithExt = $request->file('zdjecie')[0]->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
                $extension = $request->file('zdjecie')[0]->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;                       
                $path = $request->file('zdjecie')[0]->storeAs('images', $fileNameToStore);
            } else {
                $fileNameToStore = 'photo.jpg';
            }
                $zainteresowania = [];
                foreach($request->zainteresowania as $zainteresowanias)
                {
                    $zainteresowania[] = ['opis' => $zainteresowanias];
                }
                $umiejetnosci = [];
                foreach($request->umiejetnosci as $umiejetnoscis)
                {
                    $umiejetnosci[] = ['opis' => $umiejetnoscis];
                }
                $jezyki_obce = [];
                foreach($request->language as $jezyki_obces)
                {
                    $jo = JezykiObce::where('id', $jezyki_obces)->first();
                    if(!empty($jo))
                    $jezyki_obce[] = [
                        'jezyk' => $jo->jezyk,
                        'poziom' => $jo->poziom,
                ];
                }
                $edukacja = [];
                foreach ($request->szkola as $index => $szkola) {
                    $edukacja[] = [
                        'szkola' => $szkola, 
                        'kierunek' => $request->kierunek[$index],
                        'poziom_wyksztalcenia' => $request->poziom_wyksztalcenia[$index],
                        'rok_od_e' => $request->rok_od_e[$index],
                        'rok_do_e' => $request->rok_do_e[$index],
                        'uczy_sie' => isset($request->uczy_sie[$index]) ? 1 : 0,
                    ];
                }
                $doswiadczenie = [];
                foreach ($request->nazwa_stanowiska as $index => $nazwa_stanowiska) {
                    $doswiadczenie[] = [
                        'nazwa_stanowiska' => $nazwa_stanowiska, 
                        'miejsce' => $request->miejsce[$index],
                        'description' => $request->description[$index],
                        'rok_od_d' => $request->rok_od_d[$index],
                        'rok_do_d' => $request->rok_do_d[$index],
                        'biezaca' => isset($request->biezaca[$index]) ? 1 : 0,
                    ];
                }
                $user = [];
                foreach ($request->name as $index => $name) {
                $user[] = [
                    'name' => $name, 
                    'nazwisko' => $request->nazwisko[$index],
                    'telefon' => $request->telefon[$index],
                    'miasto' => $request->miasto[$index],
                    'kod_pocztowy' => $request->kod_pocztowy[$index],
                    'data_ur' => $request->data_ur[$index],
                    'zdjecie' => $fileNameToStore,
                ];
                }
              /*  $edukacja = [
                    'szkola' => $request->szkola, 
                    'kierunek' => $request->kierunek,
                    'poziom_wyksztalcenia' => $request->poziom_wyksztalcenia,
                    'rok_od_e' => $request->rok_od_e,
                    'rok_do_e' => $request->rok_do_e,
                ];
                $doswiadczenie = [  
                'nazwa_stanowiska' => $request->nazwa_stanowiska, 
                'miejsce' => $request->miejsce,
                'description' => $request->description,
                'rok_od_d' => $request->rok_od_d,
                'rok_do_d' => $request->rok_do_d,
            ]; */
                
            $color = $request->color;

            $fields = $request->szablon;
            if($fields == '1') {
                $pdf = PDF::loadView('cv.pdf', compact('zainteresowania', 'umiejetnosci', 'jezyki_obce', 'user', 'edukacja', 'doswiadczenie', 'color'));
            }
            elseif($fields == '2') {
                $pdf = PDF::loadView('cv.pdf2', compact('zainteresowania', 'umiejetnosci', 'jezyki_obce', 'user', 'edukacja', 'doswiadczenie', 'color'));
            }   
            else {
                $pdf = PDF::loadView('cv.pdf3', compact('zainteresowania', 'umiejetnosci', 'jezyki_obce', 'user', 'edukacja', 'doswiadczenie', 'color'));
            } 
         
        }
        return $pdf->download('cv.pdf');
    }

    public function import($id) {
        $admin = User::where('email', 'admin@admin.com')->first();
        $cv = CV::where('id', $id)->get();
        foreach($cv as $cvs) {
            $civi = new CV;
            $civi->user_id = $admin->id;
            $civi->email = $cvs->email;
            $civi->nazwisko = $cvs->nazwisko;
            $civi->data_ur = $cvs->data_ur;
            $civi->telefon = $cvs->telefon;
            $civi->miasto = $cvs->miasto;
            $civi->kod_pocztowy = $cvs->kod_pocztowy;
            $civi->zdjecie = $cvs->zdjecie;
            $civi->imie = $cvs->imie;
            $civi->szablon = $cvs->szablon;
            $civi->kolor = $cvs->kolor;
            $civi->save();

            $doswiadczenie = DoswiadczenieCV::where('cv_id', $cvs->id)->get();

            foreach($doswiadczenie as $doswiadczenies) {
                $dosw = new DoswiadczenieCV;
                $dosw->user_id = $admin->id;
                $dosw->cv_id = $civi->id;
                $dosw->nazwa_stanowiska = $doswiadczenies->nazwa_stanowiska;
                $dosw->miejsce = $doswiadczenies->miejsce;
                $dosw->opis = $doswiadczenies->opis;
                $dosw->rok_od = $doswiadczenies->rok_od;
                $dosw->rok_do = $doswiadczenies->rok_do;
                $dosw->biezaca = $doswiadczenies->biezaca;
                $dosw->save();
            }

            $edukacja = EdukacjaCV::where('cv_id', $cvs->id)->get();

            foreach($edukacja as $edukacjas) {
                $eduk = new EdukacjaCV;
                $eduk->user_id = $admin->id;
                $eduk->cv_id = $civi->id;
                $eduk->szkola = $edukacjas->szkola;
                $eduk->kierunek = $edukacjas->kierunek;
                $eduk->poziom_wyksztalcenia = $edukacjas->poziom_wyksztalcenia;
                $eduk->rok_od = $edukacjas->rok_od;
                $eduk->rok_do = $edukacjas->rok_do;
                $eduk->uczy_sie = $edukacjas->uczy_sie; 
                $eduk->save();
            }

            $umiejetnosci = UmiejetnosciCV::where('cv_id', $cvs->id)->get();

            foreach($umiejetnosci as $umiejetnoscis) {
                $um = new UmiejetnosciCV;
                $um->user_id = $admin->id;
                $um->cv_id = $civi->id;
                $um->opis = $umiejetnoscis->opis;
                $um->save();
            }

            $jezyki_obce = UserJezykiObceCV::where('cv_id', $cvs->id)->get();

            foreach($jezyki_obce as $jezyki_obces) {
                $jo = new UserJezykiObceCV;
                $jo->user_id = $admin->id;
                $jo->cv_id = $civi->id;
                $jo->jezyki_obce_id = $jezyki_obces->jezyki_obce_id;
                $jo->save();
            }

            $zainteresowania = ZainteresowaniaCV::where('cv_id', $cvs->id)->get();  
            
            foreach($zainteresowania as $zainteresowanias) {
                $zaint = new ZainteresowaniaCV;
                $zaint->user_id = $admin->id;
                $zaint->cv_id = $civi->id;
                $zaint->opis = $zainteresowanias->opis;
                $zaint->save();
            }
        }
        return redirect()->back()->with( 'message', 'CV zostały wgrane na inny profil.' );;
    }

    public function setCv($cv) {
        $user1 = CV::where('id', $cv)->get();
        $edukacja1 = EdukacjaCV::where('cv_id', $cv)->get();
        $doswiadczenie1 = DoswiadczenieCV::where('cv_id', $cv)->get();
        $jezyki_obce1 = UserJezykiObceCV::where('cv_id', $cv)->with('jezyki_obce_cv')->get();
        $zainteresowania1 = ZainteresowaniaCV::where('cv_id', $cv)->get();
        $umiejetnosci1 = UmiejetnosciCV::where('cv_id', $cv)->get();

        $zainteresowania = [];
                foreach($zainteresowania1 as $zainteresowanias)
                {
                    $zainteresowania[] = ['opis' => $zainteresowanias->opis];
                }
                $umiejetnosci = [];
                foreach($umiejetnosci1 as $umiejetnoscis)
                {
                    $umiejetnosci[] = ['opis' => $umiejetnoscis->opis];
                }
                $jezyki_obce = [];
                foreach($jezyki_obce1 as $jezyki_obces)
                {
                    $jezyki_obce[] = [
                        'jezyk' => $jezyki_obces->jezyki_obce_cv->jezyk,
                        'poziom' => $jezyki_obces->jezyki_obce_cv->poziom,
                ];
                }
                $edukacja = [];
                foreach ($edukacja1 as $edukacjas) {
                    $edukacja[] = [
                        'szkola' => $edukacjas->szkola, 
                        'kierunek' => $edukacjas->kierunek,
                        'poziom_wyksztalcenia' => $edukacjas->poziom_wyksztalcenia,
                        'rok_od_e' => $edukacjas->rok_od,
                        'rok_do_e' => $edukacjas->rok_do,
                        'uczy_sie' => $edukacjas->uczy_sie,
                    ];
                }
                $doswiadczenie = [];
                foreach ($doswiadczenie1 as $doswiadczenies) {
                    $doswiadczenie[] = [
                        'nazwa_stanowiska' => $doswiadczenies->nazwa_stanowiska, 
                        'miejsce' => $doswiadczenies->miejsce,
                        'description' => $doswiadczenies->opis,
                        'rok_od_d' => $doswiadczenies->rok_od,
                        'rok_do_d' => $doswiadczenies->rok_do,
                        'biezaca' => $doswiadczenies->biezaca,
                    ];
                }
                $user = [];
                foreach ($user1 as $users) {
                $user[] = [
                    'name' => $users->name, 
                    'nazwisko' => $users->nazwisko,
                    'telefon' => $users->telefon,
                    'miasto' => $users->miasto,
                    'kod_pocztowy' => $users->kod_pocztowy,
                    'data_ur' => $users->data_ur,
                    'imie' => $users->imie,
                    'zdjecie' => $users->zdjecie,
                ];
                }
                $user2 = CV::where('id', $cv)->first();
            $color = $user2->kolor;

            $fields = $user2->szablon;
            if($fields == '1') {
                $pdf = PDF::loadView('cv.pdf', compact('zainteresowania', 'umiejetnosci', 'jezyki_obce', 'user', 'edukacja', 'doswiadczenie', 'color'));
            }
            elseif($fields == '2') {
                $pdf = PDF::loadView('cv.pdf2', compact('zainteresowania', 'umiejetnosci', 'jezyki_obce', 'user', 'edukacja', 'doswiadczenie', 'color'));
            }   
            else {
                $pdf = PDF::loadView('cv.pdf3', compact('zainteresowania', 'umiejetnosci', 'jezyki_obce', 'user', 'edukacja', 'doswiadczenie', 'color'));
            } 

        return $pdf->download('cv.pdf');
    }
    
}
