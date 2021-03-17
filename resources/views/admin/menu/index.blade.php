@extends('layouts.admin', ['menu' => true])
@section('title')
    ADMIN | MENU
@endsection
@section('admin-content')
    {!! Menu::render() !!}
@endsection

@push('scripts-menu')
    {!! Menu::scripts() !!}
@endpush

