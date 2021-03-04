@extends('master')
@section('title', 'Navigácia')


@section('content')

    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">Nastavenia menu</h1>
    <div class="item-normal mt-2">
        <div class="row">
            {!! \Harimayco\Menu\Facades\Menu::render() !!}
        </div>
    </div>
    @include('dashboard.partials.ending')

@endsection
