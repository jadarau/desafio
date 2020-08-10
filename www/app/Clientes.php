<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clientes extends Model
{
    //
    public function cadastrar($id, $empresa, $cnpj, $telefone, $responsavel, $email){
        if($id){
            $salvar = Clientes::find($id);
        }else{
            $salvar = new Clientes();
        }
        
        $salvar->cnpj = $cnpj;
        $salvar->nome_empresa = $empresa;
        $salvar->telefone = $telefone;
        $salvar->responsavel = $responsavel;
        $salvar->email = $email;
        
        return $salvar->save();
    }

    public function busca($nome){
        return DB::table('clientes')->where([
            ['nome_empresa','like','%'.$nome.'%']
        ])->get();
    }

    public function cliente_id($id){
        return $pessoa = Clientes::find($id);
    }
}
