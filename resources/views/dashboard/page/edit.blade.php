@extends('master')
@section('title', $page->title)


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">{{$page->title}}</h1>

    <div class="item-normal mt-2">

        {!!  \Collective\Html\FormFacade::open(['action' =>['PageController@update', $page->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('title', $page->title, ['id' => 'title', 'class' => 'form-control mt-2', 'required' => 'true']) }}
        </div>
        <script>
            let value = document.getElementById('title');
            value.onkeyup = function () {
                document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
            }
        </script>

        <p class="font-italic text-gray">URL : https://www.tzbpro.sk/page/<span id="url">{{$page->slug}}</span></p>
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('text', $page->text, ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('img', 'Header obrázok' , ['class' => 'form-control-label mb-3']) }}
            {{ \Collective\Html\FormFacade::file('img') }}
        </div>
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('siebar', 'Kategória') }}
            {{ \Collective\Html\FormFacade::select('sidebar',['none' => 'Žiadna','Dokumentacia' => 'Dokumentácia'],$page->sidebar) }}
        </div>

        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť stránku</button>
        {!! \Collective\Html\FormFacade::close() !!}
    </div>


    @include('dashboard.partials.ending')
@endsection
