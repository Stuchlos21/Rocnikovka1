@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<script>
    //alert('Vítej uživateli: {{ Auth::user()->name }} {{ Auth::user()->surname }}');
</script>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


            <meta http-equiv="refresh" content="0; /hours" />


        @if (Auth::user()->status == 1 || Auth::user()->status == 2)
            <h1>Homepage</h1>
        @else
            <h1>Vítejte na stránce!</h1>
        @endif
@endsection
