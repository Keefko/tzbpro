@extends('master')
@section('title', $page->title)

@section('content')


    <style>
        #pageheader {
            background: linear-gradient(rgba(55, 96, 57,0.8),rgba(55, 96, 57,1)), url({{asset('images/'.$page->img)}});
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 80vh;

            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
    </style>
    <header id="pageheader">

        @include('partials.menu')

        <div class="pagehead text-center container">
            <h1 class="pt-3"> {{$page->title}}</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            @if($page->sidebar == "Dokumentacia")
                <div class="col-lg-4 col-md-12 sidebar">
                    <nav id="sidebar">
                        <div class="sidebar-header" id="accordion" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Dokumentacie
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <ul class="list-unstyled components" id="pageSubmenu">
                                @foreach($services as $service)
                                <li>
                                    <a href="{{url($service->button_url)}}">{{$service->title}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-8 col-md-12 page">
                    <p>
                        {!! $page->text !!}
                    </p>
                </div>
            @else
                <div class="col-lg-12 col-md-12 page">
                    <p>
                        {!! $page->text !!}
                    </p>
                </div>
            @endif
        </div>
    </div>
    @include('partials.contact')
@endsection
