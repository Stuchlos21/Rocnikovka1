@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">   
                <div class="panel-heading"> {{$user->surname}} {{$user->name}} - Třída: {{$user->tridas}}</div>
                    <div class="panel-body">
                        <div>
                            <small>
                                <b>Přezdívka:</b> {{$user->nickname}}
                                <br>
                                <b>Adresa:</b> {{$user->adress}}
                                <br>
                                <b>E-mail:</b> {{$user->email}}
                                <br>
                                <b>Tel. číslo:</b> {{$user->phone_number}}
                            </small>
                                <br>
                            {!!Form::open(['action' => ['UserController@destroy', $user->id_user], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Smazat', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection