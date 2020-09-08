<?php

namespace App\Http\Controllers;

use App\Convites;
use App\Post;
use App\recomendacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projeto = Post::all()->find(Auth::user()->id_projeto);
        $tt=0;
        if(Auth::user()->matter =='TID' or Auth::user()->matter =='TCC' or Auth::user()->matter =='Projeto de Pesquisa'){
            $tt=1;
        }
        $convites = Convites::all()->where('id_destino',Auth::user()->id);
        $recomendacoes = new recomendacao();
        $recomendacoes = recomendacao::all()->where('id_destino',Auth::user()->id);
        $recomendacoes = count($recomendacoes);

        $mypost = new Post();
        $mypost = Post::all()->where('id_author','=',Auth::user()->id);

        $post = new Post();
        $post = Post::orderBy('created_at', 'desc')->where('available','=',1)->get();
        $ranking = Post::orderBy('rate', 'desc')->where('available','=',1)->take(5)->get();
        return view('home',[
            'mypost' => $mypost,
            'post' => $post,
            'ranking' => $ranking,
            'projeto'=>$projeto,
            'convites'=>$convites,
            'recomendacao'=>$recomendacoes
        ]);
    }
}
