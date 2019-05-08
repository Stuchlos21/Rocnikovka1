@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Hodiny</div>      
                        <div class="panel-body">
                            @if(count($hours) > 0)
                                @foreach ($hours as $hour)
                                    <div class="well">
                                    <h3><a href="/hours/{{$hour->id_hodiny}}">
                                            {{$hour->datum}} -
                                            {{$hour->ucitel}}
                                        </a></h3>
                                         <small>
                                            Přidána: {{$hour->created_at}}
                                                <br>
                                            Číslo ve dni: {{$hour->Číslo_ve_dni}} 
                                        </small>
                                    </div>
                                @endforeach
                            @else
                                <p>Žádné rezervované hodiny!</p>
                                <a href="#">Rezervovat teď !</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection