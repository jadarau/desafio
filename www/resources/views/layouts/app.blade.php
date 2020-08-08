<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/cdn.datatables.net_1.10.20_js_jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/ajax_googleapis_com_ajax_libs_jquery_3.4.1_jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('js/cdnjs.cloudflare.com_ajax_libs_popper.js_1.14.3_umd_popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/code.jquery.com_jquery-1.11.1.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('js/code.jquery.com_ui_1.11.1_jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jQueryMask/dist/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jQueryMask/dist/jquery.mask.min.js') }}" type="text/javascript"></script>  
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        #cad_inativo{
            display:none;
        }
        #busca_ativa{
            display:none;
        }
        #tela_busca{
            display:none;
        }
        label{
            color:black;
            font-weight: bold;
        }
    </style>

</head>
<body>

<script type="text/javascript">
    $(document).ready(function(){
        var acao = '<?php echo $acao; ?>';

        if(acao == "buscar"){
            $('#cad_inativo').show(); 
            $('.nav-item').css({height:"30px"});  
            $('#cad_ativo').hide();            
            $('#busca_inativa').hide();
            $('#busca_ativa').show();
            $('#tela_cad').hide();
            $('#tela_busca').show();
        }

        $(document).on('click', '.busca', function(){
            // alert('busca');         
            $('#cad_inativo').show(); 
            $('.nav-item').css({height:"30px"});  
            $('#cad_ativo').hide();            
            $('#busca_inativa').hide();
            $('#busca_ativa').show();
            $('#tela_cad').hide();
            $('#tela_busca').show();
        });

        $(document).on('click', '.cadastro', function(){
            // alert('cadastro');
            $('.nav-item').css({height:"40px"});
            $('#cad_ativo').show();
            $('#cad_inativo').hide();
            $('#busca_inativa').show();
            $('#busca_ativa').hide();
            $('#tela_busca').hide();
            $('#tela_cad').show();            
        });

        $("#buscando").click(function(){
            // alert('oi');
            $("#busca").submit();
        });
    });

    
</script>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="font-weight:bold" href="{{ url('/') }}">
                    {{ __('Voltar') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color:black;font-weight:bold" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
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
