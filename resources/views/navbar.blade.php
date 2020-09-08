<!doctype html>
<html lang="pt-br">
<head>
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}" >
    <script src="{{asset('jquery/jquery-3.4.1.min.js')}}"></script>
{{--    jquery local--}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

    {{--    jquery via cdn--}}
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">--}}
{{--    <script src="{{asset('js/materialize.min.js')}}"></script>--}}
    <link rel="stylesheet" href="{{url('css/estilo.css')}}">
    {{--    <link rel="stylesheet" href="{{url('css/estilo.css')}}">--}}
<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
{{--    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>--}}

    <title>@yield('titulo')</title>
</head>
<body style="background-color: #f8f9fa">
<header>
    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="{{route('produtos.listar')}}">Estoque</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('produtos.cadastro')}}">Cadastro <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="">Baixa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{date('d-m-Y')}}</a>

                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="O que procura?" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
{{--        --}}
{{--        <header>--}}
{{--            <nav>--}}
{{--                <div class="nav-wrapper" style="background-color: #e8eaf6">--}}
{{--                    <a href="#" class="brand-logo right" ></a>--}}
{{--                    <ul id="nav-mobile" class="left hide-on-med-and-down">--}}
{{--                        <li><a href="{{route('produtos.listar')}}" style="color: black">Estoque</a></li>--}}
{{--                        <li><a href="{{route('produtos.cadastro')}}" style="color: black">Cadastro</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </header>--}}
    @show
</header>

<main>
    <div>
        @yield('conteudo')
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>


</main>


<footer>
    @section('footer')
    @show
</footer>

</body>
</html>
