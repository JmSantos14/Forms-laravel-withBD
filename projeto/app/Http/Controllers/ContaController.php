<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class ContaController extends Controller
{
    public function index()
    {

        $request = Http::get('http://api.inovacomm.com.br/api/gpstech')->json();
        
        //Regisros do BD
        $contas = Conta::orderByDesc('nome')->get();
        return view('conta.index', ['conta'=> $contas]);
        
        //Caregando a view
        //return view('conta.index', ['request'=> $request]);
    }

    public function create()
    {
        return view('conta.create');
    }
 
    public function store(ContaRequest $request)
    {
        //Mensagem erro
        $request->validated();

        //Direcionamento para visualizar
        $conta = Conta::create($request->all());
        return redirect()->route('conta.show', ['conta'=> $conta->id])->with('Sucesso', 'Conta Criada com Sucesso');

    }

    public function show(Conta $conta)
    {
        return view('conta.show', ['conta'=> $conta]);
    }

    public function edit(Conta $conta)
    {
        return view('conta.edit', ['conta'=> $conta]);
    }

    public function update(ContaRequest $request,Conta $conta)
    {
        $request->validated();
        
        try {

        //Editar no bnco de dados
        $conta->update([
            'nome'=> $request->nome,
            'nascimento'=> $request->nascimento,
            'sexo'=> $request->sexo,
            'cidade'=> $request->cidade
        ]);
        //Salvar log
        Log::info('Conta Editada com Sucesso', ['id' => $conta->id, 'conta' => $conta]);


        //Direcionamento para update
        return redirect()->route('conta.show', ['conta'=> $conta->id])->with('Sucesso', 'Conta Atualizada com Sucesso');

        } catch(Exception $e){
            //Salvar Log de Erro
            Log::warning('Tentativa de Edicao de Conta', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Conta Nao Editada');
        }
    }

    public function destroy(Conta $conta)
    {
        //Apagar
        $conta->delete();
        return redirect()->route('conta.index')->with('Sucesso', 'Conta Apagada com Sucesso');
    }
}
