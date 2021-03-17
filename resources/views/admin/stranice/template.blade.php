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

            </div>
            <div class="footer-content">

            </div>
        </div>
    </div>
@endsection
