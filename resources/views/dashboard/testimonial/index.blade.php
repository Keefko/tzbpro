@extends('master')
@section('title','Referencie')


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">Referencie</h1>

    <div class="mt-3">
        <button class="btn btn-custom btn-custom-green" id="new">
            Pridať referenciu
        </button>
        <button class="btn btn-custom btn-custom-grey" id="type">
            Zobrazit typy referencii
        </button>
    </div>


    <div class="item mt-2" id="types">
        <div class="table-responsive">

            <div class="mt-2">
                {!!  \Collective\Html\FormFacade::open(['action' =>'TypeController@store', 'method' => 'POST'])  !!}
                @csrf
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('type', 'Typ Referencie', ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::text('type', '', ['id' => 'title', 'class' => 'form-control','required' => 'true']) }}
                </div>

                <script>
                    let value = document.getElementById('title');
                    value.onkeyup = function () {
                        document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
                    }
                </script>

                <p class="font-italic text-gray">URL : https://www.tzbpro.sk/page/<span id="url"></span></p>

                <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Vytvoriť typ referencii</button>
                {!! \Collective\Html\FormFacade::close() !!}
            </div>

            <table class="table mt-2">
                <thead>
                <tr>
                    <th scope="col">Text</th>
                    <th scope="col">Typ</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="bg-white">

                @foreach($types as $type)
                    <tr data-toggle="collapse" data-target="{{'#toggle'.$type->id}}" class="accordion-toggle">
                        <td class="font-weight-bold">{{$type->type}}</td>
                        <td>
                            @csrf()
                            {!! \Collective\Html\FormFacade::open(['action' => ['TypeController@destroy', $type->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                            {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom btn-custom-delete'])}}
                            {!! \Collective\Html\FormFacade::close() !!}
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6" class="hiddenRow">
                            <div class="accordion-body collapse p-4" id="{{'toggle'.$type->id}}">
                                {!!  \Collective\Html\FormFacade::open(['action' =>['TypeController@update', $type->id], 'method' => 'PUT'])  !!}
                                @csrf


                                <div class="form-group">
                                    {{ \Collective\Html\FormFacade::label('type', 'Typ Referencie', ['class' => 'form-control-label']) }}
                                    {{ \Collective\Html\FormFacade::text('type', $type->type, [ 'id' => 'title','class' => 'form-control','required' => 'true']) }}
                                </div>

                                <script>
                                    let value = document.getElementById('title');
                                    value.onkeyup = function () {
                                        document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
                                    }
                                </script>

                                <p class="font-italic text-gray">URL : https://www.tzbpro.sk/page/<span id="url">{{$type->type}}</span></p>
                                <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť typ referencii</button>
                                {!! \Collective\Html\FormFacade::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="item mt-2" id="item">
        {!!  \Collective\Html\FormFacade::open(['action' =>'TestimonialController@store', 'method' => 'POST'])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('text', '', ['class' => 'form-control', 'required' => 'true']) }}
        </div>
        <select class="form-control" name="type" id="type">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">
                    {{ $type->type }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Vytvoriť referenciu</button>
        {!! \Collective\Html\FormFacade::close() !!}
    </div>

    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Text</th>
                <th scope="col">Typ</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="bg-white">

                        @foreach($testimonials as $testimonial)
                            <tr data-toggle="collapse" data-target="{{'#toggle'.$testimonial->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$testimonial->text}}</td>
                                @if(isset($testimonial->type->type))
                                    <td class="font-weight-bold">{{$testimonial->type->type}}</td>
                                @endif
                                <td>
                                    @csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['TestimonialController@destroy', $testimonial->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom btn-custom-delete'])}}
                                    {!! \Collective\Html\FormFacade::close() !!}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$testimonial->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['TestimonialController@update', $testimonial->id], 'method' => 'PUT'])  !!}
                                        @csrf


                                        <div class="form-group">
                                            {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                                            {{ \Collective\Html\FormFacade::text('text', $testimonial->text, ['class' => 'form-control', 'required' => 'true']) }}
                                        </div>
                                        @if(isset($testimonial->type->type))
                                            <select class="form-control" name="type" id="type">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}" {{ ( $type->id == $testimonial->type->id) ? 'selected' : '' }}>
                                                        {{ $type->type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť referenciu</button>
                                        {!! \Collective\Html\FormFacade::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-2 d-flex justify-content-center">
        {{ $testimonials->links() }}
    </div>

    @include('dashboard.partials.ending')
@endsection
