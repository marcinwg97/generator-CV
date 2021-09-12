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
<table class="table">
    <thead>
      <tr>
        <th>Nazwa stanowiska</th>
        <th>Miejsce</th>
        <th>Opis</th>
        <th>Rok od</th>
        <th>Rok do</th>
        <th>Edytuj</th>
        <th style="text-align:center">Usuń</th>
      </tr>
    </thead>
    <tbody>
    @foreach($doswiadczenie as $doswiadczenies)
    <tr>
    <td>{{$doswiadczenies->nazwa_stanowiska}}</td>
    <td>{{$doswiadczenies->miejsce}}</trd>
    <td>{{$doswiadczenies->opis}}</td>
    <td>{{$doswiadczenies->rok_od}}</td>
    @if($doswiadczenies->biezaca == 1)
<td><p>teraz</p></td>
@else
<td><p>{{$doswiadczenies->rok_do}}</p></td>
@endif
    <td><button class="btn btn-warning"><a href="{{ route('profile.data.doswiadczenie.edit', $doswiadczenies->id) }}">Edytuj</a></button></td>
    <td><form action="{{ route('profile.data.doswiadczenie.destroy', $doswiadczenies->id) }}" method="post" accept-charset="utf-8">
@csrf
@method("DELETE")
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </div>
                          
</form></td></tr>
    @endforeach
</tbody>
</table>
<button class="btn btn-success"><a href="{{ route('profile.data.doswiadczenie.create') }}">Dodaj</a></button>
@endsection