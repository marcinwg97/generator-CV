@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/user') }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav bold">
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

<form enctype="multipart/form-data" action="{{ route('profile.data.doswiadczenie.update', $doswiadczenie->id) }}" method="post" accept-charset="utf-8">
@csrf
                  @method('PATCH')
                  <div class="form-group row">
<div class="form-group col-12 col-lg-6">
                                <label for="szkola" class="col-form-label">Nazwa stanowiska:</label>

                                <div>
                                    <input id="nazwa_stanowiska" type="text" class="form-control" name="nazwa_stanowiska" value="{{ $doswiadczenie->nazwa_stanowiska }}" required autofocus>

                                    @if ($errors->has('nazwa_stanowiska'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nazwa_stanowiska') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                <div class="form-group col-12 col-lg-6">
                                <label for="miejsce" class="col-form-label">Miejsce:</label>

                                <div>
                                    <input id="miejsce" type="text" class="form-control" name="miejsce" value="{{ $doswiadczenie->miejsce }}" required autofocus>

                                    @if ($errors->has('miejsce'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('miejsce') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="description" class="col-form-label">Opis:</label>

                                <div>
                                    <input id="description" type="text" class="form-control" name="description" value="{{ $doswiadczenie->opis }}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="rok_od" class="col-form-label">Rok od:</label>

                                <div>
                                    <input id="rok_od" type="month" class="form-control" name="rok_od" value="{{ $doswiadczenie->rok_od }}" required autofocus>

                                    @if ($errors->has('rok_od'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rok_od') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6 rok_do_d">
                                <label for="rok_do" class="col-form-label">Rok do:</label>

                                <div>
                                    <input id="rok_do" type="month" class="form-control" name="rok_do" value="{{ $doswiadczenie->rok_do }}" autofocus>

                                    @if ($errors->has('rok_do'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rok_do') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                    <div class="form-check">
                                        <label>
                                            <input type="checkbox" name="biezaca" id="checked_d"> W chwili obecnej
                                        </label>
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