@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Žáci ve třídách</div>      
                        <div class="panel-body">
                            @if(count($users) > 0)
                                @foreach ($users as $user)
                                    <div class="well">
                                    <h3><a href="/users/{{$user->id_user}}">
                                            {{$user->surname}} 
                                            {{$user->name}}
                                            - Třída: {{$user->tridas}}
                                        </a></h3>
                                        <small>
                                            <b>Přidán:</b> {{$user->created_at}}
                                            <!--
                                            <br>
                                            {{$user->email}}
                                            <br>
                                            tel: {{$user->phone_number}}
                                            -->
                                        </small>
                                    </div>
                                @endforeach
                            @else
                                <p>Žádní žáci nenalezeni!/p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection