<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    //
    public function cadastrar(Request $request){
        $id = $request->id;
        $empresa = $request->empresa;
        $cnpj = $request->cnpj;
        $telefone = $request->tel;
        $responsavel = $request->responsavel;
        $email = $request->email;

        $cnpj = str_replace('.','',$cnpj);
        $cnpj = str_replace('/','',$cnpj);
        $cnpj = str_replace('-','',$cnpj);

        $telefone = str_replace('(','',$telefone);
        $telefone = str_replace(')','',$telefone);
        $telefone = str_replace(' ','',$telefone);
        $telefone = str_replace('-','',$telefone);

        $salvar = new Clientes();
        $result = new Clientes();
        $acao = "abrir";
        $busca = "";
        $pessoa = new Clientes();

        if($salvar->cadastrar($id, $empresa, $cnpj, $telefone, $responsavel, $email)){            
            $acao = "buscar";
            $cliente = new Clientes();
            $result = $cliente->busca("");
        }
        
        // return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca));
        return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca,'pessoa'=>$pessoa));
    }

    public function buscar(Request $request){
        $cli = $request->cliente;
        $busca = $cli;
       
        $cliente = new Clientes();
        $result = $cliente->busca($cli);
        $acao = "buscar";
        $pessoa = new Clientes();

        return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca,'pessoa'=>$pessoa));
    }

    public function visualisar($id){
        
        $cliente = new Clientes();
        $result = "";
        $acao = "editar";
        $busca = "";        
        $pessoa = $cliente->cliente_id($id);

        // var_dump($pessoa);
        // die();

        return view('home')->with(array('result'=>$result,'acao'=>$acao, 'busca'=>$busca,'pessoa'=>$pessoa));
    }

    public function endereco(){

        return view('endereco');
    }
}
