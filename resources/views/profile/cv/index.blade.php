@extends('layouts.app')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Generuj CV</th>
      </tr>
    </thead>
    <tbody>
    @foreach($cv as $cvs)
    <tr>
    <td><a href="{{ route('profile.cv.details.dane_osobowe.index', $cvs->id) }}">{{ $cvs->id }}</a></td>
    <td><form enctype="multipart/form-data" action="{{ route('profile.cv.index', $cvs->id) }}" method="post" accept-charset="utf-8">
                  @csrf
                            <div class="form-group col-12">
                                    <button type="submit" class="btn btn-success">Generuj</button>
                            </div>
                            </form></td>
  <td><form enctype="multipart/form-data" action="{{ route('profile.import', $cvs->id) }}" method="post" accept-charset="utf-8">
                  @csrf
                            <div class="form-group col-12">
                                    <button type="submit" class="btn btn-success">Importuj</button>
                            </div>
                            </form></td>
  </tr>
    @endforeach
</tbody>
</table>

@endsection