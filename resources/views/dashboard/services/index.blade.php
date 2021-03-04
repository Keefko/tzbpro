@extends('master')
@section('title','Služby')


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">Profesie</h1>

    <button class="btn btn-custom btn-custom-green mt-3" id="new">
        Pridať profesiu
    </button>



    <div class="item mt-3" id="item">
        {!!  \Collective\Html\FormFacade::open(['action' =>'ServiceController@store' ,'method' => 'POST', 'enctype' => "multipart/form-data"])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('title', '', ['id' => 'title', 'class' => 'form-control', 'required' => 'true']) }}
        </div>
        <button type="button" class="btn btn-custom btn-custom-green" data-toggle="modal" data-target="#exampleModal">
           Vyber ikonky
        </button>
        <div class="form-group mt-2">
            {{ \Collective\Html\FormFacade::label('icon', 'Ikonka', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('icon', '', ['id' => 'icon', 'class' => 'form-control', 'required' => 'true']) }}
        </div>

        <div class="form-group mt-2">
            {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('button_text', 'Text tlačítka', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('button_text', '', ['class' => 'form-control', 'required' => 'true']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('button_url', 'Url tlačítka', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('button_url', '', ['class' => 'form-control', 'required' => 'true']) }}
        </div>


        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Vytvoriť profesiu</button>
        {!! \Collective\Html\FormFacade::close() !!}


    </div>

    @include('dashboard.services.icon')
    <section id="dash">
        <div class="servicesd row ">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-box bg-white">
                        <div class="card-body">
                            <div class="card-title">
                                <h2><a href="{{url('/service/'.$service->id.'/edit')}}">{{$service->title}}</a></h2>
                            </div>
                            <div class="card-text">
                                {!! $service->text !!}
                                @csrf()
                                {!! \Collective\Html\FormFacade::open(['action' => ['ServiceController@destroy', $service->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                                {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom btn-custom-delete'])}}
                                {!! \Collective\Html\FormFacade::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('dashboard.partials.ending')
@endsection
