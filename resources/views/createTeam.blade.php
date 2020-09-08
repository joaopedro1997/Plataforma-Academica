@extends('layouts.appp')
@section('titulo')
    Aderir ao projeto
@endsection
@section('content')

    <body style="background-color: white">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <div class="container col-6 mt-4" style="text-align: justify">
        @if($errors->all())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <h4>Informações sobre o projeto</h4>
        <form action="{{route('team.validate',$posts->id)}}" >
            @csrf
            @method('put')


            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <label for=""style="font-size: 14px" class="font-weight-bold"  >Título</label>
            <input type="text" class="form-control " name="title"required readonly value="{{$posts->title}}">
            <label  for="type" class="font-weight-bold" >Colegiado</label>

            <input type="text" class="form-control " name="title"required readonly value="{{$posts->collegiate}}">
            <label   class="font-weight-bold ">Autor do tema</label>
            <input type="text" class="form-control mb-3" name="title"required readonly value="{{$posts->author}}">

            <label  style="font-size: 14px" class="font-weight-bold ">Descrição</label>
            <textarea class="form-control mb-3 "readonly name="description" required>{{$posts->body}}</textarea>

            <a href="#" class="btn btn-primary active " data-toggle="modal" data-target="#mymodal">Iniciar projeto</a>

            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header " >
                            <h5 class="modal-title ">Autorização</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-justify">
                            <label for=""style="font-size: 14px" class="font-weight-bold"  >Confirmar senha: </label>
                            <input type="password" class="form-control " name="password"required>
                            <input id="email"  readonly="true" type="hidden" class="form-control" name="email" value="{{ Auth::user()->email  }}" required autocomplete="email">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-success" value="Fazer projeto">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    </body>
    <script src=""></script>

    {{--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
        <script type="text/javascript">

        </script>
@endsection

