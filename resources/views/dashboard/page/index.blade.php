@extends('master')
@section('title','Podstránky')


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">Podstránky</h1>

    <button class="btn btn-custom btn-custom-green mt-3" id="new">
        Pridať stránku
    </button>



    <div class="item mt-3" id="item">
        {!!  \Collective\Html\FormFacade::open(['action' =>'PageController@store' ,'method' => 'POST', 'enctype' => "multipart/form-data"])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('title', '', ['id' => 'title', 'class' => 'form-control', 'required' => 'true']) }}
        </div>
        <script>
            let value = document.getElementById('title');

            value.onkeyup = function () {
                document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
            }
        </script>

        <p class="font-italic">URL : https://www.tzbpro.sk/page/<span id="url"></span></p>

        <div class="form-group mt-2">
            {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('img', 'Header obrázok' , ['class' => 'form-control-label mb-3']) }}
            {{ \Collective\Html\FormFacade::file('img') }}
        </div>
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('siebar', 'Kategória' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::select('sidebar',['none' => 'Žiadna','Dokumentacia' => 'Dokumentácia'],['class' => 'form-control description mt-2', 'id' => 'sidebar']) }}
        </div>

        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Vytvoriť stránku</button>
        {!! \Collective\Html\FormFacade::close() !!}

    </div>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Názov</th>
                <th scope="col">Url</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="bg-white">
            @foreach($pages as $page)
            <tr>
                <td><a href="{{url('/page/'. $page->id . '/edit')}}" class="font-weight-bold">{{$page->title}}</a></td>
                @if($page->id == 1)
                    <td><a href="{{url('/profesie')}}">/profesie</a></td>
                @else
                    <td><a href="{{url('/page/'. $page->slug)}}">{{'/page/' . $page->slug}}</a></td>
                @endif
                <td>
                    @csrf()
                    {!! \Collective\Html\FormFacade::open(['action' => ['PageController@destroy', $page->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom btn-custom-delete'])}}
                    {!! \Collective\Html\FormFacade::close() !!}
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @include('dashboard.partials.ending')
@endsection
