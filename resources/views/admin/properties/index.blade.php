@extends('layouts.admin', ['imovina' => true])
@section('title')
    ADMIN | IMOVINA
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                <select class="select-wrap main-input" onchange="sort($(this).val(), 'property-ajax')">
                    <option value='{{route('imovina-pretraga','sort=najnovije')}}'>NEWEST</option>
                    <option value='{{route('imovina-pretraga','sort=najstarije')}}'>OLDEST</option>
                    <option value='{{route('imovina-pretraga','sort=a-z')}}'>A-Z</option>
                    <option value='{{route('imovina-pretraga','sort=z-a')}}'>Z-A</option>
                </select>
            </div>
            <div class="search-side">
                <input class="def-background" type="text" name="search" id="searchProperties"  onkeyup="search('{{ route('imovina-pretraga') }}', 'searchProperties', 'property-ajax')" placeholder="Search">
            </div>
        </div>
    </div>

    <div id="property-ajax" class="admin-content">
        @include('include.properties._ajax_admin_properties')
    </div>

@endsection
