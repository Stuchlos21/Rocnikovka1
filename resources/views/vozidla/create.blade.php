@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Přidat nové vozidlo!</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'CarsController@store', 'method' => 'POST']) !!}
                        <div>
                            {{Form::label('nazev', 'Název',['class' => 'form-label'])}}
                            {{Form::text('nazev', '', ['class' => 'form-control', 'placeholder' => 'Skoda', 'required'])}}
                        </div>

                        <div>
                            {{Form::label('typ', 'Typ',['class' => 'form-label'])}}
                            {{Form::text('typ', '', ['class' => 'form-control', 'placeholder' => 'Fabia, Superb', 'required'])}}
                        </div>

                        <div>
                            {{Form::label('spz', 'SPZ',['class' => 'form-label'])}}
                            {{Form::text('spz', '', ['class' => 'form-control', 'placeholder' => '4U2 2548', 'required'])}}
                        </div>

                        <div>
                            {{Form::label('rok_vyroby', 'Rok výroby',['class' => 'form-label'])}}
                            {{Form::number('rok_vyroby', '', ['class' => 'form-control', 'placeholder' => '2000', 'required', 'min' => 1884])}}
                        </div>

                        <div>
                            {{Form::label('barva', 'Barva',['class' => 'form-label'])}}
                            {{Form::color('barva', '', ['class' => 'form-control', 'placeholder' => '2000', 'required'])}}
                        </div>

                        <div class="help2" title="Barva zhruba podle pole nad!">?</div>

                        <div>
                            {{Form::label('barva_slovy', 'Barva slovy',['class' => 'form-label'])}}
                            {{Form::text('barva_slovy', '', ['class' => 'form-control', 'placeholder' => 'Zelena, Cervena', 'required'])}}
                        </div>

                        <div>
                            {{Form::label('palivo', 'Palivo',['class' => 'form-label'])}}
                            {{Form::text('palivo', '', ['class' => 'form-control', 'placeholder' => 'Benzín, Diesel', 'required'])}}
                        </div>
                        <br>
                            {{Form::submit('Odeslat', ['class' => 'btn btn-primary'])}}              
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection