@extends('master')
@section('title','Služby')


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">Sekcie</h1>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Názov</th>
            </tr>
            </thead>
            <tbody class="bg-white">


            @foreach($sections as $section)
                <tr data-toggle="collapse" data-target="{{'#toggle'.$section->id}}" class="accordion-toggle">
                    <td class="font-weight-bold">{{$section->title}}</td>
                </tr>

                <tr>
                    <td colspan="6" class="hiddenRow">
                        <div class="accordion-body collapse p-4" id="{{'toggle'.$section->id}}">

                            {!!  \Collective\Html\FormFacade::open(['action' =>['SectionController@update', $section->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                            @csrf
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Názov', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $section->title, ['id' => 'title', 'class' => 'form-control mt-2', 'required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('img', 'Header obrázok' , ['class' => 'form-control-label mb-3']) }}
                                {{ \Collective\Html\FormFacade::file('img') }}
                            </div>
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', $section->text, ['class' => 'form-control description mt-2']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('button1_text', 'Text tlačítka', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('button1_text',$section->button_first_text, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('button1_url', 'Url tlačítka', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('button1_url', $section->button_first_url, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('button2_text', 'Text tlačítka', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('button2_text',$section->button_second_text, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('button2_url', 'Url tlačítka', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('button2_url', $section->button_second_url, ['class' => 'form-control']) }}
                            </div>


                            <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť sekciu</button>
                            {!! \Collective\Html\FormFacade::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @include('dashboard.partials.ending')
@endsection
