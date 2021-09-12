@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.dane_osobowe.index', $cevi->id) }}">Dane osobowe</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.doswiadczenie.index', $cevi->id) }}">Doświadczenie</a>
</div>
<div class="col-lg-2 col-12 profile-nav">
<a href="{{ route('profile.cv.details.edukacja.index', $cevi->id) }}">Edukacja</a>
</div>
<div class="col-lg-2 col-12 profile-nav bold">
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
        <th>Język</th>
        <th>Poziom</th>
        <th>Edytuj</th>
        <th style="text-align:center">Usuń</th>
      </tr>
    </thead>
    <tbody>
    <tr>
@foreach($jezyki_obce_user as $jezyki_obce_users)
<td><p>{{$jezyki_obce_users->id}}</p></td>
<td><p>{{$jezyki_obce_users->jezyki_obce_cv->jezyk}}</p></td>
<td><p>{{$jezyki_obce_users->jezyki_obce_cv->poziom}}</p></td>
<td><button class="btn btn-warning"><a href="{{ route('profile.cv.details.jezyki_obce.edit', [$jezyki_obce_users->cv_id, $jezyki_obce_users->id]) }}">Edytuj</a></button></td>
<td><form action="{{ route('profile.cv.details.jezyki_obce.destroy', [$jezyki_obce_users->cv_id, $jezyki_obce_users->id]) }}" method="post" accept-charset="utf-8">
@csrf
@method("DELETE")
<div class="form-group col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger">Zapisz</button>
                                </div>
                            </div>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
<button class="btn btn-success"><a href="{{ route('profile.cv.details.jezyki_obce.create', $cevi->id) }}">Dodaj</a></button>
@endsection