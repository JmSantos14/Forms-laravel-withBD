@extends('layouts.admin')

@section('content') 

    
    <h2>Editar Conta</h2>

    @if(session('error'))
        <span style="color: #f00;">
            {{ session('Aerror') }}
            <br>
        </span>
    @endif

    @if($errors->any())
        <div class="alert alert-danger m-3" role="alert">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
        <br>
    @endif   

    <div class="card-body">
        <form action="{{ route('conta.update', ['conta' => $conta->id]) }}" method="POST" class="row g-3">
         @csrf
        @method('PUT')

        <div class="col-12">
        <label for="nome" class="form-label">Nome: </label>
        <input type="text" name="nome" class="form-control" id=nome placeholder="Nome e Sobrenome" value="{{ old('nome', $conta->nome) }}">
        </div>

        <div class="col-12">
        <label for="nascimento" class="form-label">Data De Nascimento: </label>
        <input type="date" name="nascimento" class="form-control" id=nascimento value="{{ old('nascimento', $conta->nascimento) }}">
        </div>

        <div class="col-12">
        <label for="sexo" class="form-label">Sexo: </label>
        <input type="text" name="sexo" class="form-control" id=sexo placeholder="M(Masculino) F(Feminino)" value="{{ old('sexo', $conta->sexo) }}">
        </div>

        <div class="col-12">
        <label for="cidade" class="form-label">Cidade: </label>
        <input type="text" name="cidade" class="form-control" id=cidade placeholder="Cidade de Nascimento" value="{{ old('cidade', $conta->cidade) }}">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-success btn-sm">Atualizar</button>
        </div>
        
        </form>
    </div>

    <form action="{{ route('conta.update', ['conta'=> $conta->id]) }}" method="post">
           


           

    </form>
</body>
</html>
@endsection