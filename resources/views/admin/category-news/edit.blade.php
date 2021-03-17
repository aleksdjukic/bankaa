@extends('layouts.admin', ['izmjenaKategorijeNovosti' => true])
@section('title')
    ADMIN | IZMJENA KATEGORIJE NOVOSTI
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                IZMJENA KATEGORIJE ZA NOVOSTI
            </div>
        </div>
    </div>
    <div class="main-body">
        <div class="container sec-background">
            <form action="{{route('category-news.update', $categoryNews->id)}}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <label class="main-label">Ime</label>
                <input class="main-input" type="text" name="name"
                       value="{{ old('name') ? old('name') : $categoryNews->name }}">
                @if ($errors->has('name'))
                    <p class="invalid-feedback errorcode">{{ $errors->first('name') }}</p>
                @endif
                <div class="submitDiv">
                    {{ method_field('PUT') }}
                    <a class="button-main red-button" href="{{ route('category-news.index') }}">ODUSTANI</a>
                    <button class="button-main">OBJAVI</button>
                </div>
            </form>
        </div>
    </div>
@endsection
