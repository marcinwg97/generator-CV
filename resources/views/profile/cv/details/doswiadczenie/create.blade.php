@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.dane_osobowe.index', $cevi->id) }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav bold">
<a href="{{ route('profile.cv.details.doswiadczenie.index', $cevi->id) }}">Doświadczenie</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.edukacja.index', $cevi->id) }}">Edukacja</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.jezyki_obce.index', $cevi->id) }}">Jezyki obce</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.umiejetnosci.index', $cevi->id) }}">Umiejętności</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.zainteresowania.index', $cevi->id) }}">Zainteresowania</a>
</div>
</div>

<form enctype="multipart/form-data" action="{{ route('profile.cv.details.doswiadczenie.index', $cevi->id) }}" method="post" accept-charset="utf-8">
                  @csrf
                  <div class="form-group row">
<div class="form-group col-12 col-lg-6">
                                <label for="szkola" class="col-form-label">Nazwa stanowiska:</label>

                                <div>
                                    <input id="nazwa_stanowiska" type="text" class="form-control" name="nazwa_stanowiska" value="" required autofocus>

                                    @if ($errors->has('szkola'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('szkola') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                <div class="form-group col-12 col-lg-6">
                                <label for="miejsce" class="col-form-label">Miejsce:</label>

                                <div>
                                    <input id="miejsce" type="text" class="form-control" name="miejsce" value="" required autofocus>

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
                                    <input id="description" type="text" class="form-control" name="description" value="" required autofocus>

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
                                    <input id="rok_od" type="month" class="form-control" name="rok_od" value="" required autofocus>

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
                                    <input id="rok_do" type="month" class="form-control" name="rok_do" value="" required autofocus>

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