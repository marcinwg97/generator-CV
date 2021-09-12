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
<div class="col-lg-2 col-12 profile-nav bold">
<a href="{{ url('/profile/data/jezyki_obce') }}">Jezyki obce</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/umiejetnosci') }}">Umiejętności</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ url('/profile/data/zainteresowania') }}">Zainteresowania</a>
</div>
</div>
<form enctype="multipart/form-data" action="{{ route('profile.data.jezyki_obce.update', $jezyki_obce_user->id) }}" method="post" accept-charset="utf-8">
                  @csrf
                  @method('PATCH')
                  <div class="form-group row">
                            <div class="form-group col-12 col-lg-6">
                            <label for="language" class="col-form-label">Język:</label>
                            <div>
                            <select class="form-control" name="language"> 
                            @foreach($jezyki_obce as $jezyki_obces)
                            <option value="{{$jezyki_obces->id}}">{{$jezyki_obces->jezyk}}, {{$jezyki_obces->poziom}}</option> 
                            @endforeach
                            </select>
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