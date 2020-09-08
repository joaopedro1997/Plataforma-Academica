@extends('layouts.appp')
@section('titulo')
    Meus Posts
@endsection
@section('content')
    @foreach($posts as $post)
        <div class="container">
            <div class="card mb-5 ">
                <div class="card-header">
                    {{$post->title}}
                    <span class="text-black-50" style="margin-left: 68%">Data de criação: {{$post->created_at->format('d-m-Y')}}</span>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$post->body}}</p>
                </div>
                <div class="card-footer" >
                    <a href="{{route('post.editar',$post->id)}}"  class="btn btn-success @if($post->available===0) disabled @endif " style="color: white">@if($post->available===0)Projeto em curso @else Editar @endif </a >
                    <span class="" style="margin-left: 84%"> curtidas: {{$post->rate}}</span>
                </div>
            </div>

        </div>
    @endforeach
@endsection

