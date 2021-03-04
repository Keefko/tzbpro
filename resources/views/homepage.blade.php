@extends('master')
@section('title','Hlavná stránka')


@section('content')
    @include('partials/header')
    @include('partials/services')
    @include('partials/about')
    @include('partials/info')
    @include('partials/testimonial')
    @include('partials.contact')
@endsection
