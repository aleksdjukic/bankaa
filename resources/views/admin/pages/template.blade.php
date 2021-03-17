@extends('layouts.admin', ['dodavanjeStranice' => true])
@section('title')
    ADMIN | TEMPLATE STRANICE
@endsection
@section('admin-content')
    <div class="filter-bar">
        <div class="container">
            <div class="filter-side">
                TEMPLATES
            </div>
        </div>
    </div>
    <?php $br = 1; ?>
    <div class="main-body">
        <div class="container sec-background">
            <div class="head-content">
                <p>TEMPLATES</p>
            </div>
            <div class="main-body-list">
                <ul>
                    <li>
                        <button><a href="{{route('pages.create', 1)}}">Kreiraj Stranicu Template 1</a></button>
                    </li>
                    <li>
                        <button><a href="{{route('pages.create', 2)}}">Kreiraj Stranicu Template 2</a></button>
                    </li>
                    <li>
                        <button><a href="{{route('pages.create', 3)}}">Kreiraj Stranicu Template 3</a></button>
                    </li>
                    <li>
                        <button><a href="{{route('pages.create', 4)}}">Kreiraj Stranicu Template 4</a></button>
                    </li>
                    <li>
                        <button><a href="{{route('pages.create', 5)}}">Kreiraj Stranicu Template 5</a></button>
                    </li>
                </ul>
            </div>
            <div class="footer-content">

            </div>
        </div>
    </div>
@endsection
