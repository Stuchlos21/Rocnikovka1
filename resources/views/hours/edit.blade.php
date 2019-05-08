@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Zapsat se na hodinu dne: {{$hour->datum}}
                    <small><strong><br>
                        Učitel: {{$hour->ucitel}}
                        <br>
                         Vozidlo: {{$hour->id_vozidla}}
                    </strong></small>
                    
                        </div>
                    <div class="panel-body">
                        {!! Form::open(['action' => ['HourController@update', $hour->id_hodiny], 'method' => 'POST']) !!}
                        <div>
                            {{Form::hidden('datum', 'Datum',['class' => 'form-label'])}}
                            {{Form::hidden('datum', $hour->datum, ['class' => 'form-control', 'placeholder' => '2019.12.19', 'required'])}}
                        </div>

                        <div>
                            {{Form::hidden('ucitel', 'Ucitel',['class' => 'form-label'])}}
                            {{Form::hidden('ucitel', $hour->ucitel, ['class' => 'form-control', 'placeholder' => '1, 2, 3', 'required', 'min' => 0, 'max' => 15])}}
                        </div>

                        <div>
                            {{Form::hidden('Číslo_ve_dni', 'Číslo ve dni',['class' => 'form-label'])}}
                            {{Form::hidden('Číslo_ve_dni', $hour->Číslo_ve_dni, ['class' => 'form-control', 'placeholder' => '1, 2, 3', 'required', 'min' => 0, 'max' => 15])}}
                        </div>

                        <div>
                            {{Form::label('surname', 'Příjmení',['class' => 'form-label'])}}
                            {{Form::text('surname', Auth::user()->surname , ['class' => 'form-control', 'required', 'readonly' => "readonly"])}}
                        </div>
                            

                        <br>
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Zapsat se!', ['class' => 'btn btn-primary'])}}              
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection