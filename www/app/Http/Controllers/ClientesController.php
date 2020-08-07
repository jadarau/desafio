<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    //
    public function cadastrar(Request $request){
        $empresa = $request->empresa;
        $cnpj = $request->cnpj;
        $telefone = $request->tel;
        $responsavel = $request->responsavel;
        $email = $request->email;

        $salvar = new Clientes();
        $result = new Clientes();
        $acao = "abrir";
        $busca = "";

        if($salvar->cadastrar($empresa, $cnpj, $telefone, $responsavel, $email)){
            
            $acao = "buscar";
            $cliente = new Clientes();
            $result = $cliente->busca("");
            return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca));
        }else{
            
            return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca));
        }
    }

    public function buscar(Request $request){
        $cli = $request->cliente;
        $busca = $cli;
       
        $cliente = new Clientes();
        $result = $cliente->busca($cli);
        $acao = "buscar";

        return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca));
    }
}
