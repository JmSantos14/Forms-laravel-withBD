@extends('layouts.admin')

@section('content')
<div class="card mt-4 mb-4 border-light shadow">
<div class="card-header d-flex justify-content-between">
            <span>Acoes</span>
            <span>
            <a href="{{ route('conta.edit', ['conta' =>$conta->id]) }}">
            <button type="button" class="btn btn-warning btn-sm me-1">Editar</button></a>  
            
            <form action="{{ route('conta.destroy', ['conta'=> $conta->id])}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('Tem Certeza Que Deseja Apagar Essa Conta ?')">Apagar</button>
            </form>
            </span>   

        </div>
    <br><h2>Detalhes da Conta</h2>
    @if(session('Sucesso'))
        <div class="alert alert-success m-3" role="alert">
                {{ session('Sucesso') }}
        </div>
        @endif

    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9">{{$conta->id}}</dd>

            <dt class="col-sm-3">Nome</dt>
            <dd class="col-sm-9">{{$conta->nome}}</dd>

            <dt class="col-sm-3">Data de Nascimento</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->nascimento)->tz('America/Sao_Paulo')->format('d/m/y') }}</dd>

            <dt class="col-sm-3">Sexo</dt>
            <dd class="col-sm-9">{{$conta->sexo}}</dd>

            <dt class="col-sm-3">Cidade Onde Nasceu</dt>
            <dd class="col-sm-9">{{$conta->cidade}}</dd>

            <dt class="col-sm-3">Conta Criada em</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Sao_Paulo')->format('d/m/y H:i:s') }}</dd>

            <dt class="col-sm-3">Ultima Edicao</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Sao_Paulo')->format('d/m/y H:i:s') }}</dd>
        </dl>
    </div> 
</div>
@endsection