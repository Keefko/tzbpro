@extends('master')
@section('title',$service->title)


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">{{$service->title}}</h1>
    <div class="item-normal mt-2">

        {!!  \Collective\Html\FormFacade::open(['action' =>['ServiceController@update', $service->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('title', $service->title, ['id' => 'title', 'class' => 'form-control mt-2', 'required' => 'true']) }}
        </div>
        <button type="button" class="btn btn-custom btn-custom-green" data-toggle="modal" data-target="#exampleModal">
            Vyber ikonky
        </button>
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('icon', 'Ikonka', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('icon', $service->icon, ['id' => 'icon', 'class' => 'form-control', 'required' => 'true']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('text', $service->text, ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('button_text', 'Text tlačítka', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('button_text',$service->button_text, ['class' => 'form-control', 'required' => 'true']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('button_url', 'Url tlačítka', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('button_url', $service->button_url, ['class' => 'form-control', 'required' => 'true']) }}
        </div>


        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť sekciu</button>
        {!! \Collective\Html\FormFacade::close() !!}
    </div>

    @include('dashboard.services.icon')

    @include('dashboard.partials.ending')
@endsection
