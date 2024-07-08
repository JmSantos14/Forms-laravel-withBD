<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conta;

class ContaSeeder extends Seeder
{
    
    public function run(): void
    {
        if(!Conta::where('nome', 'Joao Marcello')->first()){
            Conta::create([
                'nome' => 'Joao Marcello',
                'nascimento' => '2004-05-06',
                'sexo' => 'M',
                'cidade' => 'niteroi'
            ]);
        }
    }
}
