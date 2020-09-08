<?php

namespace App\Http\Controllers;

use App\Compentes_projetos;
use App\Convites;
use App\Files;
use App\Post;
use App\Projeto;
use App\Rate;
use App\recomendacao;
use App\User;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;
class PostConstroller extends Controller
{


    public function create()
    {

        return view('create');
    }

    public function store(Request $request)
    {

//        dd($request->file('arquivo'));
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->description;
        $post->collegiate = $request->collegiate;
        $post->author = Auth::user()->name;
        $post->id_author = Auth::user()->id;
        $post->save();
        if ($request->file('arquivo')!=''){
            for ($i = 0; $i < count($request->allFiles()['arquivo']); $i++ ){
                $file = $request->allFiles()['arquivo'][$i];
                $files = new Files();
                $files->id_post=$post->id;
                $files->path = $file->store('arquivos/' . $post->id);
                $files->save();
                unset($files);

            }
        }


        return redirect()->route('home');
    }

    public function rate(Request $request)
    {

        $user = Rate::all()->where('id_post' ,'=', $request->id_post)->where('id_user', '=', $request->id_user);
        if ($user->isEmpty()){
            $rate = new Rate();
            $rate->id_user = $request->id_user;
            $rate->id_post = $request->id_post;
            $rate->save();
            $post = Post::find($request->id_post);
            $post->increment('rate');
            $post->save();
            $message[]='curtida!';
            echo json_encode($message);
            return;
        }
        $message[]='ja curtiu';
        echo json_encode($message);
        return;
    }

    public function showmyposts()
    {
        $post = new Post();
        $post = Post::all()->where('id_author','=',Auth::user()->id);
        return view('myposts',[
            'posts'=>$post
        ]);
    }

    public function editar(Post $posts)
    {
        return view('edit',[
            'posts' => $posts
        ]);
    }

    public function editsave(Post $post, Request $request)
    {

        $post->title = $request->title;
        $post->body = $request->description;
        $post->collegiate = $request->collegiate;
        $post->author = Auth::user()->name;
        $post->id_author = Auth::user()->id;
        $post->save();
        return redirect()->route('home');
    }

    public function validacao()
    {
        if (Auth::user()->matter =='TID' or Auth::user()->matter =='TCC' or Auth::user()->matter =='Projeto de Pesquisa'){

//            return redirect()->route('post.team') ;
            echo json_encode('liberado');
            return;
        }

        echo json_encode("negado");
        return ;


    }

    public function team(Post $posts )
    {
        if (Auth::user()->matter =='TID' or Auth::user()->matter =='TCC' or Auth::user()->matter =='Projeto de Pesquisa') {

            return view('createTeam',[
                'posts'=>$posts
            ]);
        }
        return redirect()->back();
    }

    public function meuperfil()
    {
        return view('myprofile');
    }

    public function alterarDados(Request $request)
    {
        $usuario = Auth::user(); // resgata o usuario
        $credentials = $request->only('email', 'password');

//        $usuario->name = $request->name; // pega o valor do input username
//        $usuario->email = $request->email; // pega o valor do input email

        if ( ! $request->password == '') // verifica se a senha foi alterada
        {
            if (Auth::attempt($credentials)){
                if ($request->password_confirmation === $request->new_password){
                    if ($request->new_password === $request->password){
                        return redirect()->back()->withInput()->withErrors(['Escolha uma senha diferente da anterior!']);
                    }
                    $usuario->password = bcrypt($request->new_password); // muda a senha do seu usuario já criptografada pela função bcrypt
                    $usuario->save(); // salva o usuario alterado =)
                    return redirect()->back()->withInput()->withSuccess('Senha alterada com sucesso!');
                }
                else{
                    return redirect()->back()->withInput()->withErrors(['Senhas não conferem!']);
                }
            }else{
                return redirect()->back()->withInput()->withErrors(['A senha antiga não confere']);
            }

        }
    }
    public function team_validate(Post $post, Request $request,User $user)
    {

        $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)){

                $query = Projeto::all(  )->where('id_user','=', Auth::user()->id);
                if(count($query)===0){
                    $projetos = new Projeto();
                    $projetos->id_user =  Auth::user()->id;
                    $projetos->id_post = $post->id;
                    $projetos->lider=1;
                    $projetos->save();

                    $componetes = new Compentes_projetos();
                    $componetes->id_projeto=$projetos->id;
                    $componetes->id_post=$post->id;
                    $componetes->id_users=Auth::user()->id;
                    $componetes->save();

                    $user = DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update(['id_projeto' => $post->id]);
                    $post->available = 0;
                    $post->vinculo_user_name = Auth::user()->name;
                    $post->vinculo_user_id = Auth::user()->id;
                    $post->save();
                    return redirect()->back()->withSuccess('Projeto adicionado!');
                }
                else{
                    return redirect()->back()->withErrors(['Só é permitido o desenvolvimento de um projeto por vez.']);
                }
            }
            else{
                return redirect()->back()->withInput()->withErrors(['Senha errada!']);
            }

    }

    public function showprojetos(Projeto $projeto)
    {
//        $projeto = Projeto::all('id_post')->where('id_user','=',Auth::user()->id);
        $post = Post::all()->find(Auth::user()->id_projeto);
        $projeto = Projeto::all()->where('id_post',$post->id)->where('id_user',Auth::user()->id)->first();

        if (empty($post)){
            return redirect()->back();
        }

        return view('projetos',[
            'post'=> $post,
            'projeto'=>$projeto
        ]);
    }

    public function convites()
    {
        $convites = new Convites();
        $convites = Convites::all()->where('id_destino', Auth::user()->id);
//        dd($convites);
        return view('convites',[
            'post' => $convites
        ]);
    }

    public function enviarConvite(Request $request, Post $post)
    {
        $componetesProjeto = new Compentes_projetos();
        $usuarios = new User();
        $usuarios = User::all()->find($request->id);
        if ($usuarios===null){
            return redirect()->back()->withErrors(['Id de usuário não encontrado']);

        }

        $componetesProjeto = Compentes_projetos::all()->where('id_users',$request->id);

        $projeto = new Projeto();
        $projeto = Projeto::all();
        $projeto = Projeto::all()->where('id_user',Auth::user()->id)->first();
        if(count($componetesProjeto)===0){

            $projeto = new Projeto();
            $projeto = Projeto::all();
            $projeto = Projeto::all()->where('id_user',Auth::user()->id)->first();

            $convite = new Convites();

            $convite = Convites::all()->where('id_origem',Auth::user()->id)->where('id_destino',$request->id);
            if (count($convite)!=0){
                return redirect()->back()->withErrors(['O convite já foi enviado!']);
            }
            $convite = new Convites();
            $convite->id_convite = $projeto->id;
            $convite->id_origem = Auth::user()->id;
            $convite->id_destino = $request->id;
            $convite->id_post = $post->id;
            $convite->save();
            return redirect()->back()->withSuccess('Convite enviado sucesso!');
        }else{
            if($request->type==='Professor'){
                $convite = new Convites();
                $convite->id_convite = $projeto->id;
                $convite->id_origem = Auth::user()->id;
                $convite->id_destino = $request->id;
                $convite->id_post = $post->id;
                $convite->save();
                return redirect()->back()->withSuccess('Convite enviado sucesso!');
            }
            return redirect()->back()->withErrors(['Este usuário já é membro de outro projeto']);

        }
    }

    public function aceitarConvite(Convites $convites)
    {
        $projetov = new Projeto();
        $projetov = Projeto::all()->where('id_user',Auth::user()->id);
        if (count($projetov)!=0){
            return redirect()->back()->withErrors(['Você já é integrante de outra equipe!']);
        }
//      dd($convites);
        $componetes = new Compentes_projetos();
        $componetes = Compentes_projetos::all()->where('id_projeto',$convites->id_convite);
        if (count($componetes)>=4){
            return redirect()->back()->withErrors(['Equipe cheia!']);
        }

        unset($componetes);
        $componetes = new Compentes_projetos();
        $componetes->id_projeto=$convites->id_convite;
        $componetes->id_post=$convites->id_post;
        $componetes->id_users=Auth::user()->id;
        $componetes->save();
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['id_projeto' => $convites->id_post]);
        $projeto = new Projeto();
        $projeto->id_user = Auth::user()->id;
        $projeto->id_post = $convites->id_post;
        $projeto->lider=0;
        $projeto->save();
        $convites->delete();

        return redirect()->back()->withSuccess('Adicionado a equipe com sucesso!');



    }

    public function exluirConvite(Convites $convites)
    {
        $convites->delete();
        return redirect()->back()->withErrors(['Convite excluido!']);
    }

    public function envRecomendacao(Request $request)
    {
        $usuarios = new User();
        $usuarios = User::all()->where('id',$request->id_destino);
        if(count($usuarios)>0){
            unset($usuarios);
//
            $recomendacoes = new recomendacao();
            $recomendacoes = recomendacao::all()->where('id_professor',Auth::user()->id)->where('id_destino',$request->id_destino);
            if(count($recomendacoes)>0){
                return redirect()->back()->withErrors(['Recomendação já enviada']);
            }
//

            $usuarios = User::all()->where('id',$request->id_destino)->first();
            if ($usuarios->id != Auth::user()->id){
                $recomendacao = new recomendacao();
                $recomendacao->id_professor = Auth::user()->id;
                $recomendacao->id_destino = $request->id_destino;
                $recomendacao->id_post = $request->id_post;
                $recomendacao->save();
                return redirect()->back()->withSuccess('Recomendação enviada com sucesso!');
            }
                else{
                    return redirect()->back()->withErrors(['Não é possivel mandar para si mesmo!']);
                }
        }else{
            return redirect()->back()->withErrors(['Usuário não encontrado!']);

        }
//        dd($usuarios);


    }

    public function showRecomendacoes()
    {

        $recomendacao = new recomendacao();
        $recomendacao = recomendacao::all()->where('id_destino',Auth::user()->id);

        return view('recomendacoes',[
            'recomendacao' => $recomendacao
        ]);
    }

}
