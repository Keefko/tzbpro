@extends('master')
@section('title','Služby')


@section('content')
    @include('dashboard.partials.sidebar')
    <h1 class="mt-4">Kontakt</h1>

    <div class="item-normal mt-2">

        {!!  \Collective\Html\FormFacade::open(['action' =>['ContactController@update', $contact->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('adress', 'Adresa' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('adress', $contact->adress, ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('ico', 'Ico', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('ico', $contact->ico, ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('dic', 'Dic', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('dic', $contact->ico, ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('icdph', 'Ic DPH', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('icdph', $contact->icdph, ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('bank', 'Bank' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('bank', $contact->bank, ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('mail', 'Mail' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('mail', $contact->mail, ['class' => 'form-control mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('phone', 'Mobil' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('phone', $contact->phone, ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('text', $contact->text, ['class' => 'form-control description mt-2']) }}
        </div>


        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('certificates', 'Certifikaty' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('certificates', $contact->certificates, ['class' => 'form-control description mt-2']) }}
        </div>
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('img', 'Header obrázok' , ['class' => 'form-control-label mb-3']) }}
            {{ \Collective\Html\FormFacade::file('img') }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('heading1', 'Hlavicka kontakt', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('heading1', $contact->heading1, ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('heading2', 'Hlavicka clenovia', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('heading2', $contact->heading2, ['id' => 'title', 'class' => 'form-control']) }}
        </div>


        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť kontakt</button>
        {!! \Collective\Html\FormFacade::close() !!}
    </div>

    <h1 class="mt-4">Členovia</h1>

    <button class="btn btn-custom btn-custom-green mt-3" id="new">
        Pridať člena
    </button>

    <div class="item mt-3" id="item">
        {!!  \Collective\Html\FormFacade::open(['action' =>'MemberController@store' ,'method' => 'POST', 'enctype' => "multipart/form-data"])  !!}
        @csrf
        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('name', 'Meno', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('name', '', ['id' => 'title', 'class' => 'form-control', 'required' => 'true']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('position', 'Pozicia', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('position', '', ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <div class="form-group mt-2">
            {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control description mt-2']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('mobil', 'Mobil', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('mobil', '', ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <div class="form-group">
            {{ \Collective\Html\FormFacade::label('mail', 'Mail', ['class' => 'form-control-label']) }}
            {{ \Collective\Html\FormFacade::text('mail', '', ['id' => 'title', 'class' => 'form-control']) }}
        </div>

        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Vytvoriť člena</button>
        {!! \Collective\Html\FormFacade::close() !!}

    </div>


    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Meno</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody class="bg-white">


            @foreach($members as $member)
                <tr data-toggle="collapse" data-target="{{'#toggle'.$member->id}}" class="accordion-toggle">
                    <td class="font-weight-bold">{{$member->name}}</td>
                    <td>
                        @csrf()
                        {!! \Collective\Html\FormFacade::open(['action' => ['MemberController@destroy', $member->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                        {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom btn-custom-delete'])}}
                        {!! \Collective\Html\FormFacade::close() !!}
                    </td>
                </tr>

                <tr>
                    <td colspan="6" class="hiddenRow">
                        <div class="accordion-body collapse p-4" id="{{'toggle'.$member->id}}">

                            {!!  \Collective\Html\FormFacade::open(['action' =>['MemberController@update', $member->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                            @csrf
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('name', 'Meno', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('name', $member->name, ['id' => 'title', 'class' => 'form-control mt-2', 'required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('position', 'Pozicia', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('position', $member->position, ['id' => 'title', 'class' => 'form-control mt-2', 'required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('text', 'Text' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('text', $member->text, ['class' => 'form-control description mt-2']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('mobil', 'Mobil', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('mobil', $member->mobil, ['id' => 'title', 'class' => 'form-control','required' => 'true']) }}
                            </div>

                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('mail', 'Mail', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('mail', $member->mail, ['id' => 'title', 'class' => 'form-control','required' => 'true']) }}
                            </div>

                            <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť člena</button>
                            {!! \Collective\Html\FormFacade::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @include('dashboard.partials.ending')
@endsection
