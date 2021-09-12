@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Generator CV</h1>
    <p class="lead">Jeżeli chcesz dodać lub zmienić swoje dane, <a href="{{ url('/profile/data/user') }}">przejdź tutaj.</a></p>
    <p class="lead">Jeżeli chcesz przejrzeć lub wyedytować swoje CV, <a href="{{ url('/profile/cv') }}">przejdź tutaj.</a></p>
  </div>
</div>

<form enctype="multipart/form-data" action="{{ url('/') }}" method="post" accept-charset="utf-8">
                  @csrf
                  <div class="row">
                            <div class="col-6">
                            <h3>Personalizacja</h3>
                            </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                            <div class="col-12 col-lg-6">
                            <label for="szablon">Który szablon chcesz wybrać?</label>
                            <select class="form-control" name="szablon">
                            <option value="1">Szablon 1</option>
  <option value="2">Szablon 2</option>
  <option value="3">Szablon 3</option>  
  </select>
  </div>
  <div class="col-12 col-lg-6">
  <label for="color">Kolor:</label>
                                <select class="form-control" name="color">
                                    <option value="black">Czarny</option>
                                    <option value="red">Czerwony</option>
                                    <option value="green">Zielony</option>
                                    <option value="blue">Niebieski</option>
                                </select>
                            </div>
                            </div>
                            </div>
                            <div class="form-group col-12">
                            <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-secondary">Utwórz CV</button>
                                    </div>
                            </div>
                            </form>
@endsection
