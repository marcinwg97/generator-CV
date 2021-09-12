@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-6 col-12 profile-nav">
<a href="{{ url('/profile/data/user') }}">Dane</a>
</div>
<div class="col-lg-6 col-12 profile-nav">
<a href="{{ url('/profile/cv') }}">CV</a>
</div>
</div>
<form enctype="multipart/form-data" action="{{ url('/profile') }}" method="post" accept-charset="utf-8">
                  @csrf
                            <div class="form-group col-12">
                                    <button type="submit" class="btn btn-success">Importuj</button>
                            </div>
                            </form>
@endsection