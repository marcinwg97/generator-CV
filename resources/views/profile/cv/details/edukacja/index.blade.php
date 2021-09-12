@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.dane_osobowe.index', $cevi->id) }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.doswiadczenie.index', $cevi->id) }}">Doświadczenie</a>
</div>
<div class="col-lg-2 col-12 profile-nav bold">
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
        <th>Id</th>
        <th>Szkoła</th>
        <th>Kierunek</th>
        <th>Poziom wykształcenia</th>
        <th>Rok od</th>
        <th>Rok do</th>
        <th>Edytuj</th>
        <th style="text-align:center">Usuń</th>
      </tr>
    </thead>
    <tbody>
@foreach($edukacja as $edukacjas)
<tr>
<td><p>{{$edukacjas->id}}</p></td>
<td><p>{{$edukacjas->szkola}}</p></td>
<td><p>{{$edukacjas->kierunek}}</p></td>
<td><p>{{$edukacjas->poziom_wyksztalcenia}}</p></td>
<td><p>{{$edukacjas->rok_od}}</p></td>
@if($edukacjas->uczy_sie == 1)
<td><p>{{$edukacjas->teraz}}</p></td>
@else
<td><p>{{$edukacjas->rok_do}}</p></td>
@endif
<td><button class="btn btn-warning"><a href="{{ route('profile.cv.details.edukacja.edit', [$edukacjas->cv_id, $edukacjas->id]) }}">Edytuj</a></button></td>
<td><form action="{{ route('profile.cv.details.edukacja.destroy', [$edukacjas->cv_id, $edukacjas->id]) }}" method="post" accept-charset="utf-8">
@csrf
@method("DELETE")
<div class="form-group col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger">Usuń</button>
                                </div>
                            </div>
</form>
</td> 
    </tr>
    @endforeach
</tbody>
</table>
<button class="btn btn-success"><a href="{{ route('profile.cv.details.edukacja.create', $cevi->id) }}">Dodaj</a></button>
@endsection