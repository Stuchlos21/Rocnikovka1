@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> Hodina dne: <b>{{$hour->datum}} </b>
                                            <br> Učitel: <b>{{$hour->ucitel}} </b>
                                            <br> Žák: <b>{{$hour->id_user}}</b></div>
                    <div class="panel-body">
                        <div>
                            <small><strong>
                                Číslo ve dni: {{$hour->Číslo_ve_dni}} 
                                <br>
                                Vozidlo: {{$hour->id_vozidla}}
                            </strong></small>
                                <br></br>

                            <!--EDIT-->
                            @if (Auth::user()->status == 3)
                                @if($hour->id_user == null)
                                    <a href="/hours/{{$hour->id_hodiny}}/edit" class="btn btn-default">Zapsat se!</a>
                                @else
                                    <p>Na tuto hodinu jsi již zapsán!<!-- Nic nezobrazeno == nemůže se zapsat nikdo -->
                                @endif
                            @endif

                            <!--DELETE-->
                            @if (Auth::user()->status == 1 || Auth::user()->surname == $hour->ucitel)
                                {!!Form::open(['action' => ['HourController@destroy', $hour->id_hodiny], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Smazat', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection