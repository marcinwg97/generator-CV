@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Generator CV</h1>
    <p class="lead">Wygeneruj swoje CV już dzisiaj! Wystarczy tylko parę kliknięć! I to za darmo!</p>
  </div>
</div>
<form enctype="multipart/form-data" action="{{ url('/') }}" method="post" accept-charset="utf-8">
                  @csrf
                  <h3>Dane osobowe</h3>
                  <hr>
                  <div class="form-group row">
<div class="col-12 col-lg-6">
                                <label for="name" class="col-form-label">Imię:</label>

                                <div>
                                    <input id="name[]" type="text" class="form-control" name="name[]" value="{{ Auth::user() ? Auth::user()->name : ''  }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                    <label for="zdjecie" class="col-form-label">Avatar:</label>

                    <div class="form-group col-lg-6 col-12">
                    <input type="file" id="zdjecie[]" name="zdjecie[]" accept="image/jpeg" class="form-control-file"> @if ($errors->has('zdjecie'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('zdjecie') }}</strong>
                                        </span> @endif
                    </div>
                </div>
                <div class="form-group col-12 col-lg-6">
                                <label for="nazwisko[]" class="col-form-label">Nazwisko:</label>

                                <div>
                                    <input id="nazwisko[]" type="text" class="form-control" name="nazwisko[]" value="{{ Auth::user() ? Auth::user()->nazwisko : ''  }}" required autofocus>

                                    @if ($errors->has('nazwisko'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nazwisko') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="telefon" class="col-form-label">Telefon:</label>

                                <div>
                                    <input id="telefon[]" type="text" class="form-control" name="telefon[]" value="{{ Auth::user() ? Auth::user()->telefon : ''  }}" required autofocus>

                                    @if ($errors->has('telefon'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="miasto" class="col-form-label">Miasto:</label>

                                <div>
                                    <input id="miasto[]" type="text" class="form-control" name="miasto[]" value="{{ Auth::user() ? Auth::user()->miasto : ''  }}" required  autofocus>

                                    @if ($errors->has('miasto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('miasto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="kod_pocztowy" class="col-form-label">Kod pocztowy:</label>

                                <div>
                                    <input id="kod_pocztowy[]" type="text" class="form-control" name="kod_pocztowy[]" value="{{ Auth::user() ? Auth::user()->kod_pocztowy : ''  }}" required autofocus>

                                    @if ($errors->has('kod_pocztowy'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kod_pocztowy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="data_ur" class="col-form-label">Data urodzenia:</label>

                                <div>
                                    <input id="data_ur[]" type="date" class="form-control" name="data_ur[]" value="{{ Auth::user() ? Auth::user()->data_ur : ''  }}" required autofocus>

                                    @if ($errors->has('data_ur'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data_ur') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-6">
                            <h3>Edukacja</h3>
                            </div>
                            <div class="col-6">
                            <a class="btn btn-secondary button-edukacja">+</a>
                            <a class="btn btn-secondary delete-edukacja">-</a>
                            </div>
                            </div>
                            <hr>
                            <div class="edukacja">
                            <div id="edukacja" class="mb-2">
                            <div class="form-group row">
                            <div class="col-lg-6 col-12">
                                <label for="szkola" class="col-form-label">Szkoła:</label>

                                <div>
                                    <input id="szkola[]" type="text" class="form-control" name="szkola[]" value="" autofocus>

                                    @if ($errors->has('szkola'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('szkola') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="kierunek" class="col-form-label">Kierunek:</label>

                                <div>
                                    <input id="kierunek[]" type="text" class="form-control" name="kierunek[]" value="" autofocus>

                                    @if ($errors->has('kierunek'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kierunek') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="poziom_wyksztalcenia" class="col-form-label">Poziom wykształcenia:</label>

                                <div>
                                    <input id="poziom_wyksztalcenia[]" type="text" class="form-control" name="poziom_wyksztalcenia[]" value="" autofocus>

                                    @if ($errors->has('poziom_wyksztalcenia'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('poziom_wyksztalcenia') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="rok_od_e" class="col-form-label">Rok od:</label>

                                <div>
                                    <input id="rok_od_e[]" type="month" class="form-control" name="rok_od_e[]" value="" autofocus>

                                    @if ($errors->has('rok_od_e'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rok_od_e') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="rok_do_e" class="col-form-label">Rok do:</label>

                                <div>
                                    <input id="rok_do_e[]" type="month" class="form-control" name="rok_do_e[]" value="" autofocus>

                                    @if ($errors->has('rok_do_e'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rok_do_e') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                <div class="col-12 col-lg-12">
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="uczy_sie"> W chwili obecnej
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                            <h3>Doświadczenie</h3>
                            </div>
                            <div class="col-6">
                            <a class="btn btn-secondary button-doswiadczenie">+</a>
                            <a class="btn btn-secondary delete-doswiadczenie">-</a>
                            </div>
                            </div>
                            <hr>
                            <div class="doswiadczenie">
                            <div id="doswiadczenie" class="mb-2">
                            <div class="form-group row">
                            <div class="col-12 col-lg-6">
                                <label for="szkola" class="col-form-label">Nazwa stanowiska:</label>

                                <div>
                                    <input id="nazwa_stanowiska[]" type="text" class="form-control" name="nazwa_stanowiska[]" value="" autofocus>

                                    @if ($errors->has('szkola'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('szkola') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                <div class="col-12 col-lg-6">
                                <label for="miejsce" class="col-form-label">Miejsce:</label>

                                <div>
                                    <input id="miejsce[]" type="text" class="form-control" name="miejsce[]" value="" autofocus>

                                    @if ($errors->has('miejsce'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('miejsce') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="description" class="col-form-label">Opis:</label>

                                <div>
                                    <input id="description[]" type="text" class="form-control" name="description[]" value="" autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="rok_od_d" class="col-form-label">Rok od:</label>

                                <div>
                                    <input id="rok_od_d[]" type="month" class="form-control" name="rok_od_d[]" value="" autofocus>

                                    @if ($errors->has('rok_od_d'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rok_od_d') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="rok_do_d" class="col-form-label">Rok do:</label>

                                <div>
                                    <input id="rok_do_d[]" type="month" class="form-control" name="rok_do_d[]" value="" autofocus>

                                    @if ($errors->has('rok_do_d'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rok_do_d') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                                <div class="col-12 col-lg-12">
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="biezaca"> W chwili obecnej
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                          <div class="row">
                            <div class="col-6">
                            <h3>Języki obce</h3>
                            </div>
                            <div class="col-6">
                            <a class="btn btn-secondary button-jezyki-obce">+</a>
                            <a class="btn btn-secondary delete-jezyki-obce">-</a>
                            </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                            <div class="col-12 col-lg-6 jezyki-obce">
                            <div id="jezyki-obce" class="mb-2">
                                <select class="form-control" name="language[]">
                                <option value="0" hidden selected>Wybierz język</option>
                                    @foreach ($languages as $language)
                                    <option value="{{$language->id}}">{!! $language->jezyk !!}, {!! $language->poziom !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            </div>
                          <div class="row">
                            <div class="col-6">
                            <h3>Umiejętności</h3>
                            </div>
                            <div class="col-6">
                            <a class="btn btn-secondary button-umiejetnosci">+</a>
                            <a class="btn btn-secondary delete-umiejetnosci">-</a>
                            </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                            <div class="col-12 col-lg-6 umiejetnosci">
                            <div id="umiejetnosci" class="mb-2">
                                    <input id="umiejetnosci[]" type="text" class="form-control" name="umiejetnosci[]" value="" autofocus>

                                    @if ($errors->has('description_um'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description_um') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-6">
                            <h3>Zainteresowania</h3>
                            </div>
                            <div class="col-6">
                            <a class="btn btn-secondary button-zainteresowania">+</a>
                            <a class="btn btn-secondary delete-zainteresowania">-</a>
                            </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                            <div class="col-12 col-lg-6 zainteresowania" >
                            <div id="zainteresowania" class="mb-2">
                            
                                    <input id="zainteresowania[]" type="text" class="form-control" name="zainteresowania[]" value="" autofocus>

                                    @if ($errors->has('zainteresowania'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('zainteresowania') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-6">
                            <h3>Personalizacja</h3>
                            </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                            <div class="col-12 col-lg-6">
                            <label for="szablon">Który szablon chcesz wybrać?</label>
                            <select class="form-control" name="szablon">
                            <option value="1">Szablon 1</option>
  <option value="2">Szablon 2</option>
  <option value="3">Szablon 3</option>  
  </select>
  </div>
  <div class="col-12 col-lg-6">
  <label for="color">Kolor:</label>
                                <select class="form-control" name="color">
                                    <option value="black">Czarny</option>
                                    <option value="red">Czerwony</option>
                                    <option value="green">Zielony</option>
                                    <option value="blue">Niebieski</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-primary">Generuj CV</button>
                                </div>
                            </div>
                            </form>
@endsection
