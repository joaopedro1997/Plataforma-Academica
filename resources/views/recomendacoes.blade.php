@extends('layouts.appp')
@section('titulo')
    Convites
@endsection
@section('content')
    @foreach($recomendacao as $recomendacoes)
        @foreach($recomendacoes->recomendacaoPost as $posts )
            @foreach($recomendacoes->recomendacaoUser as $prof)
    <div class="container">
        @if($errors->all())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

            <div class="card text-justify mt-4">

                <div class="card-body">
                    <h5 class="card-title">{{$posts->title}}</h5>
                    <p class="card-text">{{$posts->body}}</p>

                                    @foreach($posts->arquivos as $file)

                        <a href="{{ env('APP_URL') }}/storage/{{$file->path}}" class="" target="_blank" alt="">Anexos</a>
                    <br>
                                    @endforeach
                    @if(\Illuminate\Support\Facades\Auth::user()->type ==='Professor')
                        <a href="" id="validate"data-toggle="modal" data-target="#recomen"   class="btn btn-outline-primary outline-secondary font-weight-bold ">Enviar recomendação</a>
                    @else
                        <a href="{{route('post.team',$posts->id)}}" id="validate"   class="btn btn-outline-primary outline-secondary font-weight-bold ">Tenho interesse</a>

                    @endif
                </div>
                <div class="card-footer align-items-center d-flex justify-content-between  " style="text-align: initial">
                    <form name="curtir">
                        <input type="hidden" name="id_user" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                        <input type="hidden" name="id_post" value="{{$posts->id}}">
                        @csrf
                        @method('POST')
                        <button  class= "btn btn-success "  href="" style="font-size: 12px">Curtir</button>
                        <button  class= "btn btn-primary disabled"  href="" style="font-size: 12px">{{$prof->name}}</button>

                    </form>

                    <span class="justify-content-end d-flex align-items-center " style="font-size: 13px">
                    <span class="badge badge-secondary badge-pill  " style="margin-right: 4px;">{{$posts->collegiate}}</span>
                        <svg class="bi bi-star-fill  " width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                        {{$posts->rate}}
                    </span>

                </div>


            </div>


    </div>

    @endforeach
    @endforeach
    @endforeach
    <script>
        $(function () {
            $('form[name="curtir"]').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: "{{route('post.rate')}}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                    }
                })
            })
        });

        $(document).ready(function(){

            $.ajax({
                url: "{{route('post.validacao')}}",
                type: "get",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){
                    if(response === 'negado'){
                        // $("#validate").addClass("disabled");
                        alert('Sua conta não contém as disciplinas necessarias para funções como tenho interesse')
                    }else{
                        console.log('tets')
                    }


                }
            })
        });

    </script>
@endsection

