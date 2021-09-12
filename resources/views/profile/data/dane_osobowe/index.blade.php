@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-2 col-12 profile-nav bold">
<a href="{{ url('/profile/data/user') }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/doswiadczenie') }}">Doświadczenie</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/edukacja') }}">Edukacja</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/jezyki_obce') }}">Jezyki obce</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/umiejetnosci') }}">Umiejętności</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/zainteresowania') }}">Zainteresowania</a>
</div>
</div>

<form enctype="multipart/form-data" action="{{ url('/profile/data/user') }}" method="post" accept-charset="utf-8">
                  @csrf
                  <div class="form-group row">
<div class="form-group col-12 col-lg-6">
                                <label for="name" class="col-form-label">Imię:</label>

                                <div>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user() ? Auth::user()->name : ''  }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                <div class="col-12 col-lg-6">
                                <label for="nazwisko" class="col-form-label">Nazwisko:</label>

                                <div>
                                    <input id="nazwisko" type="text" class="form-control" name="nazwisko" value="{{ Auth::user() ? Auth::user()->nazwisko : ''  }}" required autofocus>

                                    @if ($errors->has('nazwisko'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nazwisko') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="telefon" class="col-form-label">Telefon:</label>

                                <div>
                                    <input id="telefon" type="text" class="form-control" name="telefon" value="{{ Auth::user() ? Auth::user()->telefon : ''  }}" required autofocus>

                                    @if ($errors->has('telefon'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="miasto" class="col-form-label">Miasto:</label>

                                <div>
                                    <input id="miasto" type="text" class="form-control" name="miasto" value="{{ Auth::user() ? Auth::user()->miasto : ''  }}" required autofocus>

                                    @if ($errors->has('miasto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('miasto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="kod_pocztowy" class="col-form-label">Kod pocztowy:</label>

                                <div>
                                    <input id="kod_pocztowy" type="text" class="form-control" name="kod_pocztowy" value="{{ Auth::user() ? Auth::user()->kod_pocztowy : ''  }}" required autofocus>

                                    @if ($errors->has('kod_pocztowy'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kod_pocztowy') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="data_ur" class="col-form-label">Data urodzenia:</label>

                                <div>
                                    <input id="data_ur" type="date" class="form-control" name="data_ur" value="{{ Auth::user() ? Auth::user()->data_ur : ''  }}" required autofocus>

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