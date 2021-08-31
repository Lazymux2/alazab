<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="{{ url('js/jquery.min.js') }}" defer ></script>


    <script src="{{ url('js/app.js') }} " defer></script>
    {{--
    <script src="{{ asset('js/angular.min.js') }}" defer type="text/javascript"></script>
    <script src="{{ asset('js/angular-route.min.js') }}" defer></script>
   --}}
    <script src=" {{ url('js/myapp.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">

   <!--link href="Fonts/fontawesome-4.6.3.min.css" rel="stylesheet" /-->

   <link rel="stylesheet" href="{{ url('Fonts/Font/font-awesome.css') }}"> 
<link href="{{ url('css/mystyle.css') }} "  rel="stylesheet" />
<link href="{{ url('css/panell.css') }}" rel="stylesheet" />


   
</head>
<body style="" >

    
    


<!-- Use any element to open the sidenav -->

@auth
<form action="{{route('logout')}}" name="logout" id="logout" style="display: none;" method="post">
    @csrf
    </form>
        
@endauth

    @include('sideMenu')
    <div id="app">

    

@yield('navbar')

    @yield('sideMenu')




        <main id="main"  class="py-4">
            @yield('content')
        
        </main>
        

        <a id="backtop" class=""  href="#app"> <i class="fa fa-chevron-up"></i> </a>

    
    </div>
    

    @yield('footer')

    
    @include('loginModel')

</body>
</html>
