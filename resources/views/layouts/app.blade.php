 <!-- Scripts -->


 <!doctype html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
     <style>
   .oscuro{
        background-color:  #505050!important;
        color: white!important;;

    }

    .claro{
        background-color: #868686 !important;
        color: white!important;;
    }

    </style>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <title id="test">{{ 'Difusion'}}</title>
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 </head>

 <body>
     <div id="app">
         <nav class="navbar navbar-expand-md">
             <div class="container">
                 <a class="navbar-brand" href="{{ url('/') }}">
                     {{ 'Difusion'}}
                 </a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                     <span class="navbar-toggler-icon"></span>
                 </button>

                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                     </ul>
                     <ul class="navbar-nav ml-auto">
                         @guest
                         @if (Route::has('login'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                         </li>
                         @endif

                         @if (Route::has('register'))
                         <li class="nav-item">
                             <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                         </li>
                         @endif
                         @else
                         <li class="nav-item ">
                             @if(Auth::user()->hasRole('admin'))
                         <li><a class="nav-link" href="{{ route('users.index') }}"> Usuarios</a></li>
                         @endif
                         <li><a class="nav-link" href="{{ route('emails.index') }}"> Correos</a></li>
                         <li><a class="nav-link" href="{{ route('clients.index') }}"> Clientes</a></li>
                         <li><a class="nav-link" href="{{ route('events.index') }}"> Eventos</a></li>
                         <li><a class="nav-link" href="{{ route('categories.index') }}"> Categorias</a></li>
                         <li><a class="nav-link"> Modo</a></li>

                                <div class="form-check form-switch">
                                 <input class="form-check-input" type="checkbox" role="switch" id="miCheck" onclick="cambiarModo()">




                         <li class="nav-item dropdown">
                             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 {{ Auth::user()->name }}
                                </a>

                             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     {{ __('Cerrar sesion') }}
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                                </div>
                            </li>

                         </li>
                         @endguest
                     </ul>
                 </div>
             </div>
         </nav>

         <main class="py-4">
             @yield('content')
         </main>
     </div>
 </body>


 </html>

 <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/dash_2.js')}}"></script>

<script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('plugins/nicescroll/nicescroll.js')}}"></script>
<script src="{{asset('plugins/currency/currency.js')}}"></script>
<script>

    function cambiarModo(){
        var cuerpo = document.body;
        cuerpo.classList.toggle("oscuro");
        // var header = document.getElementsByClassName("header navbar navbar-expand-md ")[0];
        // header.classList.toggle("oscuro");
        var table=document.getElementsByClassName("container ")[0];
        table.classList.toggle("oscuro");
        var navbar = document.getElementsByClassName("navbar-nav ml-auto")[0];
        navbar.classList.toggle("oscuro");
        var dashboard = document.getElementsByClassName("card")[0];
        dashboard.classList.toggle("oscuro");

        var title = document.getElementById("test");
        title.classList.toggle("oscuro");


        var nav_item = document.getElementsByClassName("nav-link");

        for(i=0; i<nav_item.length; i++){
         nav_item[i].classList.toggle("oscuro");
        }


        console.log(title);


         var nave = document.getElementById("app");
         nave.classList.toggle("oscuro");
        // console.log(table);
    }
</script>


