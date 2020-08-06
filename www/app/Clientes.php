<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    public function cadastrar($empresa, $cnpj, $telefone, $responsavel, $email){
        $salvar = new Clientes();
        $salvar->cnpj = $cnpj;
        $salvar->nome_empresa = $empresa;
        $salvar->telefone = $telefone;
        $salvar->responsavel = $responsavel;
        $salvar->email = $email;
        return $salvar->save();
    }
}
