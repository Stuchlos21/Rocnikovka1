<!DOCTYPE html>

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="shortcut icon" href="https://www.hrfireandsafety.co.uk/wp-content/uploads/2017/04/car.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
        <!--Jquerry-->
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
        </script>

        <script src="{{ asset('js/app.js') }}">
            //javascript
        </script>
        <!---->
 
        <title>{{config('app.name', 'AUTOŠKOLA')}}</title>  <!-- nastaveni title podle .env app.nam -->
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        @include('inc.messages')
        @yield('content')
    </div>
</body>
</html>
