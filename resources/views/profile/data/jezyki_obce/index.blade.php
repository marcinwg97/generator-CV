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
<td><p>{{$jezyki_obce_users->jezyki_obce->jezyk}}</p></td>
<td><p>{{$jezyki_obce_users->jezyki_obce->poziom}}</p></td>
<td><button class="btn btn-warning"><a href="{{ route('profile.data.jezyki_obce.edit', $jezyki_obce_users->id) }}">Edytuj</a></button></td>
<td><form action="{{ route('profile.data.jezyki_obce.destroy', $jezyki_obce_users->id) }}" method="post" accept-charset="utf-8">
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
<button class="btn btn-success"><a href="{{ route('profile.data.jezyki_obce.create') }}">Dodaj</a></button>
@endsection