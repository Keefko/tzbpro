@extends('master')
@section('title',$type)

@section('content')

    <style>
        #pageheader {
            background: linear-gradient(rgba(55, 96, 57,0.8),rgba(55, 96, 57,1)), url({{asset('images/')}});
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
            <h1 class="pt-3"> {{$type}}</h1>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 sidebar">
                <nav id="sidebar">
                    <div class="sidebar-header" id="accordion" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Referencie
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <ul class="list-unstyled components" id="pageSubmenu">
                            @foreach($types as $type)
                                <li>
                                    <a href="{{url('/testimonial/'. $type->type)}}">{{$type->type}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-8 col-md-12 reference">
                <div class="row">

                    @foreach($testimonials as $reference)
                        <div class="col-md-6 testimonial-item">
                            <div class="card mb-2 d-flex ">
                                <div class="card-body text-center align-items-center d-flex justify-content-center">
                                    <div class="text">
                                        <h4 class="card-title font-weight-bold">{{$reference->text}}</h4>
                                        <p class="card-text">{{$reference->type->type}}</p>
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
