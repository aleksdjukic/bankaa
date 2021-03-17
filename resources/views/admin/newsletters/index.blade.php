@extends('layouts.admin', ['newsletters' => true])
@section('title')
    ADMIN | NEWSLETTERS
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                <select class="select-wrap main-input" onchange="sort($(this).val(), 'newsletters-ajax')">
                    <option value='{{route('newsletters-pretraga','sort=najnovije')}}'>NEWEST</option>
                    <option value='{{route('newsletters-pretraga','sort=najstarije')}}'>OLDEST</option>
                    <option value='{{route('newsletters-pretraga','sort=a-z')}}'>A-Z</option>
                    <option value='{{route('newsletters-pretraga','sort=z-a')}}'>Z-A</option>
                </select>
            </div>
            <div class="search-side">
                <input class="def-background" type="text" name="search" id="searchNewsletters"  onkeyup="search('{{ route('newsletters-pretraga') }}', 'searchNewsletters', 'newsletters-ajax')" placeholder="Search">
            </div>
        </div>
    </div>
    <div id="newsletters-ajax" class="admin-content">
        @include('include.newsletters._ajax_admin_newsletters')
    </div>
@endsection
