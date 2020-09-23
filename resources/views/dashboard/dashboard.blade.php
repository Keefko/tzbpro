@extends('master')
@section('title','Administrácia')


@section('content')
        <div class="wrapper">
            @include('dashboard.partials._menu')
            <div class="main_container">
                <h1 class="pt-4 pb-2"><b>Profil</b></h1>

                @include('dashboard.partials._messages')
                <div class="item">

                </div>
            </div>
@endsection
