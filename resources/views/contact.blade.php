@extends('master')
@section('title','Kontakt')

@section('content')


    <style>
        #pageheader {
            background: linear-gradient(rgba(55, 96, 57,0.8),rgba(55, 96, 57,1)), url({{$contact->img}});
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
            <h1 class="pt-3">Kontakt</h1>
        </div>
    </header>

    <div class="container">
        <div class="contact-info mt-5">
            <h1>{{$contact->heading1}}</h1>
            <div class="row mt-4">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="services mx-auto">
                        <div class="card-body text-left">
                            <div class="card-title">
                                <h5 class="font-weight-bold mt-2">Adresa</h5>
                            </div>
                            <div class="card-text">
                                <p>
                                    {!!$contact->adress!!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="services mx-auto">
                        <div class="card-body text-left">
                            <div class="card-title">
                                <h5 class="font-weight-bold mt-2">TZBpro s.r.o.</h5>
                            </div>
                            <div class="card-text">
                                <div class="mt-2 ico"><span class="font-weight-bold">IČO:</span> {{$contact->ico}}</div>
                                <div class="mt-2 ico"><span class="font-weight-bold">DIČ: </span>{{$contact->dic}}</div>
                                <div class="mt-2 ico"><span class="font-weight-bold">IČ DPH: </span>{{$contact->icdph}}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="services mx-auto">
                        <div class="card-body text-left">
                            <div class="card-title">
                                <h5 class="font-weight-bold mt-2">Bankové spojenie</h5>
                            </div>
                            <div class="card-text">
                                {!! $contact->bank !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="services mx-auto">
                        <div class="card-body text-left">
                            <div class="card-title">
                                <h5 class="font-weight-bold mt-2">Kontakt</h5>
                            </div>
                            <div class="card-text">
                                <div class="mt-2 ico"><span class="font-weight-bold">Mail:</span> {{$contact->mail}}</div>
                                <div class="mt-2 ico">{!!$contact->phone  !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 contact-text mt-3">

                    {!! $contact->text !!}
            </div>
            <div class="col-lg-12 col-md-12 contact-text mt-3 mw-100">

                {!! $contact->certificates !!}
            </div>
        </div>


        <div class="members mt-5">
            <h1>{{$contact->heading2}}</h1>
            <div class="row mt-4">
                @foreach($members as $member)
                    <div class="col-lg-6 col-md-12">
                        <div class="card2">
                            <div class="card-header">
                                {{$member->name}}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$member->position}}</h5>
                                {!! $member->text !!}
                                <div class="mt-2"><span class="font-weight-bold">Mail:</span> {{$member->mail}}</div>
                                <div class="mt-2"><span class="font-weight-bold">Mobil:</span>{{$member->mobil}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    @include('partials.contact')
@endsection
