@extends('layouts.admin', ['korisnik' => true])
@section('title')
    ADMIN | KORISNICI
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                <select class="select-wrap main-input" onchange="sort($(this).val(), 'users-ajax')">
                    <option value='{{route('korisnici-pretraga','sort=najnovije')}}'>NEWEST</option>
                    <option value='{{route('korisnici-pretraga','sort=najstarije')}}'>OLDEST</option>
                    <option value='{{route('korisnici-pretraga','sort=a-z')}}'>A-Z</option>
                    <option value='{{route('korisnici-pretraga','sort=z-a')}}'>Z-A</option>
                </select>
            </div>
            <div class="search-side">
                <input class="def-background" type="text" name="search" id="searchUsers"  onkeyup="search('{{ route('korisnici-pretraga') }}', 'searchUsers', 'users-ajax')" placeholder="Search">
            </div>
        </div>
    </div>
    <div id="users-ajax" class="admin-content">
        @include('include.users._ajax_admin_users')
    </div>
@endsection
