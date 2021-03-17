@extends('layouts.admin', ['sveStranice' => true])
@section('title')
    ADMIN | STRANICE
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                <select class="select-wrap main-input" onchange="sort($(this).val(), 'pages-ajax')">
                    <option value='{{route('stranice-pretraga','sort=najnovije')}}'>NEWEST</option>
                    <option value='{{route('stranice-pretraga','sort=najstarije')}}'>OLDEST</option>
                    <option value='{{route('stranice-pretraga','sort=a-z')}}'>A-Z</option>
                    <option value='{{route('stranice-pretraga','sort=z-a')}}'>Z-A</option>
                </select>
            </div>
            <div class="search-side">
                <input class="def-background" type="text" name="search" id="searchPages"
                       onkeyup="search('{{ route('stranice-pretraga') }}', 'searchPages', 'pages-ajax')"
                       placeholder="Search">
            </div>
        </div>
    </div>

    <div id="pages-ajax" class="admin-content">
        @include('include.pages._ajax_admin_pages')
    </div>

@endsection
