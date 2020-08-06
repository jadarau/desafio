<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class UserController extends Controller
{
    //
    public function cadastrar(Request $request){
        $empresa = $request->empresa;
        $cnpj = $request->cnpj;
        $telefone = $request->tel;
        $responsavel = $request->responsavel;
        $email = $request->email;

        $salvar = new Clientes();

        // echo $empresa;
        // die();

        if($salvar->cadastrar($empresa, $cnpj, $telefone, $responsavel, $email)){
            echo "<script>OI</script>";
            return redirect()->route('home')->with('msg','Salvo com sucesso!');
        }else{
            echo "<script>NAO</script>";
            return redirect()->route('home')->with('msg','Ocorreu um erro! Tente novamente.');
        }
    }
}
