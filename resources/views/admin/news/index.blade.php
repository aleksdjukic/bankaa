@extends('layouts.admin', ['sveNovosti' => true])
@section('title')
    ADMIN | NOVOSTI
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                <select class="select-wrap main-input" onchange="sort($(this).val(), 'news-ajax')">
                    <option value='{{route('novosti-pretraga','sort=najnovije')}}'>NEWEST</option>
                    <option value='{{route('novosti-pretraga','sort=najstarije')}}'>OLDEST</option>
                    <option value='{{route('novosti-pretraga','sort=a-z')}}'>A-Z</option>
                    <option value='{{route('novosti-pretraga','sort=z-a')}}'>Z-A</option>
                </select>
            </div>
            <div class="search-side">
                <input class="def-background" type="text" name="search" id="searchNews"  onkeyup="search('{{ route('novosti-pretraga') }}', 'searchNews', 'news-ajax')" placeholder="Search">
            </div>
        </div>
    </div>

    <div id="news-ajax" class="admin-content">
        @include('include.news._ajax_admin_news')
    </div>
@endsection
