@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-2 col-12 profile-nav">
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
<div class="col-lg-2 col-12 profile-nav bold">
<a href="{{ url('/profile/data/zainteresowania') }}">Zainteresowania</a>
</div>
</div>

<form enctype="multipart/form-data" action="{{ route('profile.data.zainteresowania.update', $zainteresowania->id) }}" method="post" accept-charset="utf-8">
                  @csrf
                  @method('PATCH')
                            <div class="form-group row">
                            <div class="form-group col-12 col-lg-6">
                            <label for="description" class="col-form-label">Zainteresowanie:</label>
                            <div>
                                    <input id="description" type="text" class="form-control" name="description" value="{{$zainteresowania->opis}}" required autofocus>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
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