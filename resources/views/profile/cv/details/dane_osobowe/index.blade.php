@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-lg-2 col-12 profile-nav bold">
<a href="{{ route('profile.cv.details.dane_osobowe.index', $user->id) }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.doswiadczenie.index', $user->id) }}">Doświadczenie</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.edukacja.index', $user->id) }}">Edukacja</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.jezyki_obce.index', $user->id) }}">Jezyki obce</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.umiejetnosci.index', $user->id) }}">Umiejętności</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.zainteresowania.index', $user->id) }}">Zainteresowania</a>
</div>
</div>
<form enctype="multipart/form-data" action="{{ route('profile.cv.details.dane_osobowe.index', $user->id) }}" method="post" accept-charset="utf-8">
                  @csrf
<div class="form-group row">
<div class="form-group col-12 col-lg-6">
                                <label for="imie" class="col-form-label">Imię:</label>

                                <div>
                                    <input id="imie" type="text" class="form-control" name="imie" value="{{ $user->imie   }}" required autofocus>

                                    @if ($errors->has('imie'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('imie') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                    <label for="zdjecie" class="col-form-label">Avatar:</label>

                    <div class="col-lg-6 col-12">
                    <input type="file" id="zdjecie" name="zdjecie" accept="image/jpeg" class="form-control-file"> @if ($errors->has('zdjecie'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('zdjecie') }}</strong>
                                        </span> @endif
                    </div>
                </div>
                <div class="form-group col-12 col-lg-6">
                                <label for="nazwisko" class="col-form-label">Nazwisko:</label>

                                <div>
                                    <input id="nazwisko" type="text" class="form-control" name="nazwisko" value="{{ $user->nazwisko   }}" required autofocus>

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
                                    <input id="telefon" type="text" class="form-control" name="telefon" value="{{ $user->telefon  }}" required autofocus>

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
                                    <input id="miasto" type="text" class="form-control" name="miasto" value="{{ $user->miasto }}" required autofocus>

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
                                    <input id="kod_pocztowy" type="text" class="form-control" name="kod_pocztowy" value="{{ $user->kod_pocztowy }}" required autofocus>

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
                                    <input id="data_ur" type="date" class="form-control" name="data_ur" value="{{ $user->data_ur }}" required autofocus>

                                    @if ($errors->has('data_ur'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('data_ur') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            </div>
                            <div class="form-group col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-secondary">Zapisz</button>
                                </div>
                            </div>
                            </form>

@endsection