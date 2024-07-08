@extends('layouts.admin')

@section('content')
    <div class="card mt4 mb-4 border-light shadow">
        <div class="card-header ">
            <span>Listar Contas</span>
            <span>
            <a href="{{ route('conta.create')}}">
            <button type="button" class="btn btn-success btn-sm">Cadastrar</button></a> <br><br>
            </span>   
        </div>

        @if(session('Sucesso'))
        <div class="alert alert-success m-3" role="alert">
                {{ session('Sucesso') }}
        </div>
        @endif
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Sexo</th>
                    <th>Cidade Onde Nasceu</th>
                    <th class="text-center"></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($contas as $conta)
                <tr>
                    <th>{{$conta->id}}</th>
                    <td>{{$conta->nome}}</td>
                    <td>{{ \Carbon\Carbon::parse($conta->nascimento)->tz('America/Sao_Paulo')->format('d/m/y') }}</td>
                    <td>{{$conta->sexo}}</td>
                    <td>{{$conta->cidade}}</td>
                    <td class="d-md-flex justify-content-center">
                        <a href="{{ route('conta.show', ['conta' => $conta->id])}}">
                        <button type="button" class="btn btn-info btn-sm me-1">Visualizar</button>
                        </a>

                        <a href="{{ route('conta.edit', ['conta' => $conta->id])}}">
                        <button type="button" class="btn btn-warning btn-sm me-1">Editar</button>
                        </a>

                        <form action="{{ route('conta.destroy', ['conta'=> $conta->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem Certeza Que Deseja Apagar Essa Conta ?')">Apagar</button>
                        </form>
                        </td>
                </tr>
                @empty
                <span style="color: #ff0000">Nenhuma Conta Encontrada</span> 
                @endforelse
                @foreach($request as $i)
                <div>
                    <p><b>nome:</b> {{$i["nome"]}}. </p>
                    <p><b>idade:</b> {{$i["idade"]}}.</p>
                    <p><b>sexo:</b> {{$i["sexo"]}}.</p>
                    <p><b>endereço:</b> {{$i["localizacao"]}}.</p>
                    <a href="{{route('api.edit', $i['id'])}}"><button>Edit</button></a>
                    <hr>

                </div>
    @endforeach

            </tbody>
        </table>
    </div> 
</div>
<br>

@endsection