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
<td><p>{{$doswiadczenies->nazwa_stanowiska}}</p></td>
<td><p>{{$doswiadczenies->miejsce}}</p></td>
<td><p>{{$doswiadczenies->opis}}</p></td>
<td><p>{{$doswiadczenies->rok_od}}</p></td>
@if($doswiadczenies->biezaca == 1)
<td><p>teraz</p></td>
@else
<td><p>{{$doswiadczenies->rok_do}}</p></td>
@endif
<td><button class="btn btn-warning"><a href="{{ route('profile.cv.details.doswiadczenie.edit', [$doswiadczenies->cv_id, $doswiadczenies->id]) }}">Edytuj</a></button></td>
<td><form action="{{ route('profile.cv.details.doswiadczenie.destroy', [$doswiadczenies->cv_id, $doswiadczenies->id]) }}" method="post" accept-charset="utf-8">
@csrf
@method("DELETE")
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </div>
                            
                            </form></td></tr>
    @endforeach
</tbody>
</table>
<button class="btn btn-success"><a href="{{ route('profile.cv.details.doswiadczenie.create', $cevi->id) }}">Dodaj</a></button>
@endsection