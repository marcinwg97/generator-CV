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
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Opis</th>
        <th>Edytuj</th>
        <th style="text-align:center">Usuń</th>
      </tr>
    </thead>
    <tbody>
    @foreach($zainteresowania as $zainteresowanias)
      <tr>
        <td>{{$zainteresowanias->id}}</td>
        <td>{{$zainteresowanias->opis}}</td>
        <td><button class="btn btn-warning"><a href="{{ route('profile.data.zainteresowania.edit', $zainteresowanias->id) }}">Edytuj</a></button></td>
        <td><form action="{{ route('profile.data.zainteresowania.destroy', $zainteresowanias->id) }}" method="post" accept-charset="utf-8">
@csrf
@method("DELETE")
<div class="form-group col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </div>
                            </div>
</form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <button class="btn btn-success"><a href="{{ route('profile.data.zainteresowania.create') }}">Dodaj</a></button>
@endsection