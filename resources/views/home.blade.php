@extends('layouts.appp')
@section('titulo')
    Painel Principal
@endsection
@section('content')
    @csrf
    <div class="list-group col-2 position-absolute " style="height: 200%;  ; margin-top: -24px">
        <span class=" list-group-item " style="height: 100%; ">
            <p class=" border-bottom py-3  mb-4">Seja Bem vindo(a) <span class="font-weight-bold" style="color: black"> {{ Auth::user()->name }}</span> !</p>
            <div >
                <table class="table-hover" style="width: 100%;">
                    <tr style="cursor: pointer">
                        <td><a href="{{route('post.show')}}" class="btn w-100 text-left @if(count($mypost)===0) disabled @endif " onMouseOver="this.style.fontWeight='bold'" onMouseOut="this.style.fontWeight='normal'" style="color: black; font-size: 16px;border-radius: 5px; ">Meus posts</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{route('projetos.show')}}" onMouseOver="this.style.fontWeight='bold'" onMouseOut="this.style.fontWeight='normal'"class="btn w-100 text-left  @if(empty($projeto)) disabled @endif" style="color: black">Projetos</a></td>
                    </tr>
                    <tr>
                        <td><a  href="{{route('convites')}}"onMouseOver="this.style.fontWeight='bold'" onMouseOut="this.style.fontWeight='normal'" class="btn w-100 text-left hover @if(count($convites)===0) disabled @endif " style="color: black">Convites<span class="badge badge-primary badge-pill"> {{count($convites)}}</span></a></td>
                    </tr>
                    <tr>
                        <td><a  href="{{route('show.recomendacoes')}}"onMouseOver="this.style.fontWeight='bold'" onMouseOut="this.style.fontWeight='normal'" class="btn w-100 text-left hover @if($recomendacao===0) disabled @endif " style="color: black">Recomendacoes<span class="badge badge-primary badge-pill"> {{$recomendacao}}</span></a></td>
                    </tr>
                </table>


            </div>

        </span>
    </div>

    <div class="list-group col-3 float-right position-relative" style= ";" >
        <span class=" list-group-item  " style="background-color:#F7F7F6; border-radius: 5px ">
            <div class="container">

    <span class="d-block">
        <span class="float-left  " style="font-size: 18px; text-align: left; margin-left: 15% ">Melhores Avaliados</span>
        <svg class="bi bi-trophy" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 1h10c-.495 3.467-.5 10-5 10S3.495 4.467 3 1zm0 15a1 1 0 011-1h8a1 1 0 011 1H3zm2-1a1 1 0 011-1h4a1 1 0 011 1H5z"/>
        <path fill-rule="evenodd" d="M12.5 3a2 2 0 100 4 2 2 0 000-4zm-3 2a3 3 0 116 0 3 3 0 01-6 0zm-6-2a2 2 0 100 4 2 2 0 000-4zm-3 2a3 3 0 116 0 3 3 0 01-6 0z" clip-rule="evenodd"/>
        <path d="M7 10h2v4H7v-4z"/>
        <path d="M10 11c0 .552-.895 1-2 1s-2-.448-2-1 .895-1 2-1 2 .448 2 1z"/>
        </svg>
    </span>

    </div>
        @foreach($ranking as $rankings)
        <button  class="btn btn-outline-light table table-striped text-justify" style="cursor: default ; background-color:white;color: black; border-radius: 10px ">
            <p class="">Titulo: {{$rankings->title}}</p>
            <p>Criador: {{$rankings->author}}</p>

        </button>
        @endforeach
        </span>
    </div>

    <div class="container m-auto " style="; width: 52%;">

        <div class=" container " style="text-align: center; margin-left: -9% ">
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
            <div class="card border-info mb-4   ">
                <div class="card-header">Criar novo post</div>

                <div class="card-body text-info">
                    <h5 class="card-title font-weight-bold" style="color: black">Posts</h5>

                    <p class="card-text  border-bottom" style="color: black">Tem ideias sobrando na caixola? Então coloque aqui um pouco delas para que outros estudantes possam adotar para si! </p>
                    <a href="#" class="btn btn-primary active " data-toggle="modal" data-target="#mymodal">Criar post</a>
                </div>
                <form action="{{route('post.store',['user'=> Auth::user()->name ])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header " >
                                    <h5 class="modal-title ">Criar post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-justify">
                                        <label for=""style="font-size: 14px" class="font-weight-bold"  >Título</label>
                                        <input type="text" class="form-control " name="title"required>
                                        <p style="font-size: 12px">Escolha um bom título para o seu post.</p>

                                        <label for="type" class="font-weight-bold" >Colegiado</label>
                                        <select class="custom-select" name="collegiate" id=""  required >
                                            <option>Administração</option>
                                            <option>Arquitetura e urbanismo</option>
                                            <option>Biomedicina</option>
                                            <option>Direito</option>
                                            <option>Educação Fisica</option>
                                            <option>Engenharia</option>
                                            <option>Enfermagem</option>
                                            <option>Engenharia Mecatrônica</option>
                                            <option>Farmácia</option>
                                            <option>Fisioterapia</option>
                                            <option>Gastronomia</option>
                                            <option>Medicína veterinária</option>
                                            <option>Sistemas de Informação</option>
                                            <option>Nutrição</option>
                                            <option>Odontologia</option>
                                            <option>Psicologia</option>
                                            <option>Publicidade e Propaganda</option>
                                            <option>Exatas</option>
                                            <option>Saúde</option>
                                            <option>Todos</option>
                                        </select>
                                        <p style="font-size: 12px">Selecione um colegiado em específico ou uma área que a sua idéia abrange.</p>
                                        <label for=""style="font-size: 14px" class="font-weight-bold ">Descrição</label>
                                        <textarea class="form-control " name="description" required></textarea>
                                        <input type="hidden" name="">
                                        <label for=""style="font-size: 14px" class="font-weight-bold ">Anexar arquivo</label>
                                        <br>
                                        <input class="form-group" type="file" name="arquivo[]" multiple id="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                    <button type="submit" class="btn btn-success">Salvar post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if(count($post)===0)
                    <p>Nenhum post disponível por enquanto! </p>
                @endif
                @foreach($post as $posts)
                @foreach($posts->userss as $userss)
                <div class="modal fade" id="recomen" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header " >
                                    <h5 class="modal-title ">Enviar recomendação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('post.recomendacao')}}" method="post">
                                    @csrf
                                    @method('post')
                                <div class="modal-body text-justify">

                                    <label for=""style="font-size: 14px" class="font-weight-bold"  >Id do estudante:</label>
                                    <input class="form-control " type="number" name="id_destino" id="">
                                    <input type="hidden" name="id_post" value="{{$posts->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>




           </div>


            <div class="card mb-5">

                <div class="card-header  justify-content-between d-flex align-items-center ">
                    <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                    </svg>
                    <div class=" position-absolute" style="margin-left: 3%; font-size:14px">
                        {{$posts->author}}
                        @if($userss->type==='Professor')
                        <img src="{{asset('toppng.com-5-point-stars-png-star-icon-flat-801x767.png')}}" width="17" height="17" alt="">
                            @endif
                    </div>
                    <span class="text-black-50" style="font-size: 12px">{{$posts->created_at->format('d-m-Y')}}</span>
                </div>
                <div class="card-body text-justify">
                    <h5 class="card-title">{{$posts->title}}</h5>
                    <p class="card-text">{{$posts->body}}</p>
                    @foreach($posts->arquivos as $file)

                        <div class="">
                            <a href="{{ env('APP_URL') }}/storage/{{$file->path}}" target="_blank">
                                <img class="" alt="" src="{{asset('anexo.png')}}" width="20" height="20">
                            </a>
                        </div>



{{--                        <a href="{{ env('APP_URL') }}/storage/{{$file->path}}" class="" target="_blank" alt="">Anexos</a>--}}
                        <br>
                        @endforeach
                        @if(\Illuminate\Support\Facades\Auth::user()->type ==='Professor')
                        <a href="{{route('post.team',$posts->id)}}" id="validate"data-toggle="modal" data-target="#recomen"   class="btn btn-outline-primary outline-secondary font-weight-bold ">Enviar recomendação</a>
                    @else
                    <a href="{{route('post.team',$posts->id)}}" id="validate"   class="btn btn-outline-primary outline-secondary font-weight-bold ">Tenho interesse</a>
                            @endif
                </div>
                <div class="card-footer align-items-center d-flex justify-content-between  " style="text-align: initial">
                    <form name="curtir">
                        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_post" value="{{$posts->id}}">
                        @csrf
                        @method('POST')
                        <button  class= "btn btn-success "  href="" style="font-size: 12px">Curtir</button>
                    </form>

                    <span class="justify-content-end d-flex align-items-center " style="font-size: 13px">
                    <span class="badge badge-secondary badge-pill  " style="margin-right: 4px;">{{$posts->collegiate}}</span>
                        <svg class="bi bi-star-fill  " width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                        {{$posts->rate}}
                    </span>

                </div>

                @endforeach
                @endforeach
        </div>

    </div>




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

