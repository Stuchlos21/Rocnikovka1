@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Přidat novou třídu!</div>
                    <div class="panel-body">
                        {!! Form::open(['action' => 'TridaController@store', 'method' => 'POST']) !!}
                            <div>
                                {{Form::label('name', 'Jméno',['class' => 'form-label'])}}
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => '1.B', 'required'])}}
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