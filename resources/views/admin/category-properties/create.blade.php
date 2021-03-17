@extends('layouts.admin', ['dodavanjeKategorijeImovine' => true])
@section('title')
    ADMIN | DODAVANJE KATEGORIJE IMOVINE
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                DODAVANJE KATEGORIJE ZA IMOVINU
            </div>
        </div>
    </div>

    <div class="main-body">
        <div class="container sec-background">
            <form action="{{route('category-properties.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="main-label">Ime</label>
                <input class="main-input" type="text" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('name') }}</p>
                @endif
                <div class="submitDiv">
                    <a class="button-main red-button" href="{{ route('category-properties.index') }}">ODUSTANI</a>
                    <button class="button-main">OBJAVI</button>
                </div>
            </form>
        </div>
    </div>
@endsection
