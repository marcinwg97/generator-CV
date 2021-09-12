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
      <td>{{$edukacjas->id}}</td>   
      <td>{{$edukacjas->szkola}}</td>  
      <td>{{$edukacjas->kierunek}}</td>  
      <td>{{$edukacjas->poziom_wyksztalcenia}}</td>  
      <td>{{$edukacjas->rok_od}}</td>  
      @if($edukacjas->uczy_sie == 1)
      <td>teraz</td>  
      @else
      <td>{{$edukacjas->rok_do}}</td>  
      @endif
      <td><button class="btn btn-warning"><a href="{{ route('profile.data.edukacja.edit', $edukacjas->id) }}">Edytuj</a></button></td>
      <td><form action="{{ route('profile.data.edukacja.destroy', $edukacjas->id) }}" method="post" accept-charset="utf-8">
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
<button class="btn btn-success"><a href="{{ route('profile.data.edukacja.create') }}">Dodaj</a></button>
@endsection