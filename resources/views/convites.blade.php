@extends('layouts.appp')
@section('titulo')
    Convites
@endsection
@section('content')
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
        <div class="card border-info mb-4   ">
            <div class="card-header">Convites de projetos</div>

            @foreach($post as $posts)

                <div class="card-body text-info">
                @foreach($posts->convites as $convite)
                    <div class="d-flex bd-highlight border border-primary rounded">
                        <div class="p-2 flex-grow-1 bd-highlight" style="color: black">{{$convite->vinculo_user_name}}</div>
                    @endforeach
                        <div class="p-2 bd-highlight"><a class="list-group-item-action active"  href="{{route('convites.aceitar',$posts->id)}}">Aceitar</a></div>
                        <div class="p-2 bd-highlight"><a class="list-group-item-action active"  href="{{route('convites.excluir',$posts->id)}}">Excluir convite</a></div>
                    </div>
                    </div>
            @endforeach
                </div>


        </div>
    </div>

@endsection

