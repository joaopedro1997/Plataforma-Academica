@extends('layouts.appp')
@section('titulo')
   Novo post
@endsection
@section('content')

<body style="background-color: white">
    <div class="container col-6 mt-4" style="text-align: justify">
        <h4>Criar um novo post</h4>
        <p class="border-bottom pb-3" style="color: gray">Criando post você pode ajudar pessoas que não estão com nenhuma idéia na caixola.</p>
        <form action="{{route('post.store',['user'=> Auth::user()->name ])}}" method="post">
            @csrf
            <label for=""style="font-size: 14px" class="font-weight-bold"  >Título</label>
            <input type="text" class="form-control " name="title"required>
            <p style="font-size: 12px">Escolha um bom título para o seu post.</p>

            <label for="type" class="font-weight-bold" >Colegiado</label>
            <select class="custom-select" name="collegiate" id="" required >
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
            <p class="border-bottom pb-3" style="font-size: 12px">Descreva aqui a sua idéia de forma coerente e concisa para que os leitores tenham um bom entendimento dela.</p>

            <input type="submit" class="btn btn-success" value="Criar post">
        </form>

    </div>
</body>

@endsection

