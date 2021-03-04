@extends('master')
@section('title','Všetky služby')

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

        @include('partials/menu')

        <div class="pagehead text-center container">
            <h1 class="pt-3"> {{$page->title}}</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 page">
                <p>
                    {!! $page->text!!}
                </p>
            </div>
            <div class="col-lg-12 col-md-12 page">
                <div class="heading">
                    <h1>{{ $section->title }}</h1>
                    @if($section->text_active == 1)
                        <p>
                            {!! $section->text !!}
                        </p>
                    @endif
                </div>
                <div class="services row">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-box bg-white">
                                <div class="d-inline">
                                    <i class="{{$service->icon}}"></i>
                                </div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h2>{{$service->title}}</h2>
                                    </div>
                                    <div class="card-text">
                                        {!! $service->text !!}
                                        @if(!empty($service->button_text))
                                        <a href="{{ url($service->button_url) }}" class="btn btn-custom btn-custom-green">{{$service->button_text}}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.contact')
@endsection


