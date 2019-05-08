@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">   
                <div class="panel-heading"> {{$car->nazev}} {{$car->typ}}</div>
                    <div class="panel-body">
                        <div>
                            <div class="barva-vozu" style="background-color:{{$car->barva}};" title="{{$car->barva}}"></div>
                                <small>
                                    <b>Rok výroby:</b> {{$car->rok_vyroby}}
                                    <br>
                                    <b>SPZ:</b> {{$car->spz}}
                                    <br>
                                    <b>Palivo:</b> {{$car->palivo}}
                                </small>                               
                            <img src="{{$car->obrazek}}" height="20" width="20">
                            <br>
                            <!-- rozliseni uzivatele pres auth -->

                                {!!Form::open(['action' => ['CarsController@destroy', $car->id_vozu], 'method' => 'POST', 'class' => 'pull-right'])!!}
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