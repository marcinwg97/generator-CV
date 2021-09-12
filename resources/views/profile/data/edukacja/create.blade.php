@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/user') }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/doswiadczenie') }}">Doświadczenie</a>
</div>
<div class="col-lg-2 col-12 profile-nav bold">
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

<form enctype="multipart/form-data" action="{{ url('/profile/data/edukacja') }}" method="post" accept-charset="utf-8">
                  @csrf
                  <div class="form-group row">
<div class="form-group col-12 col-lg-6">
                                <label for="szkola" class="col-form-label">Szkoła:</label>

                                <div>
                                    <input id="szkola" type="text" class="form-control" name="szkola" value="" required autofocus>

                                    @if ($errors->has('szkola'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('szkola') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                <div class="form-group col-12 col-lg-6">
                                <label for="kierunek" class="col-form-label">Kierunek:</label>

                                <div>
                                    <input id="kierunek" type="text" class="form-control" name="kierunek" value="" required autofocus>

                                    @if ($errors->has('kierunek'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kierunek') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="poziom_wyksztalcenia" class="col-form-label">Poziom wykształcenia:</label>

                                <div>
                                    <input id="poziom_wyksztalcenia" type="text" class="form-control" name="poziom_wyksztalcenia" value="" required autofocus>

                                    @if ($errors->has('poziom_wyksztalcenia'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('poziom_wyksztalcenia') }}</strong>
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
                            <div class="form-group col-12 col-lg-6 rok_do_e">
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
                                            <input type="checkbox" name="uczy_sie" id="checked_e"> W chwili obecnej
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