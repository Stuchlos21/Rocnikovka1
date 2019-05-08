@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Vozidla</div>      
                        <div class="panel-body">
                            @if(count($cars) > 0)
                                @foreach ($cars as $car)
                                    <div class="well">
                                        <div class="barva-vozu" style="background-color:{{$car->barva}};" title="{{$car->barva}}"></div>
                                        <h3><a href="/vozidla/{{$car->id_vozu}}">
                                            {{$car->nazev}} 
                                            {{$car->typ}}
                                        </a></h3>
                                        <small>
                                            <b>Rok výroby:</b> {{$car->rok_vyroby}}<br>
                                            <b>SPZ:</b> {{$car->spz}}<br>
                                            <b>Palivo:</b> {{$car->palivo}}<br>
                                        </small>                                    
                                    </div>
                                @endforeach
                            @else
                                <p>Žádná vozidla nenalezena!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection