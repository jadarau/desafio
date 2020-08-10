@extends('layouts.app')

@section('content')

<script type="text/javascript">
    var acao = '<?php echo $acao; ?>';

    function abrir(url){
        window.open(url,'endereco',"width=700,height=540,left=400,top=110");
    }

    function mascara(o,f){
		v_obj=o
		v_fun=f
		setTimeout("execmascara()",1)
	}

	function execmascara(){
		v_obj.value=v_fun(v_obj.value)
	}

	function mtel(v){
		v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
		v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
		v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
		return v;
	}

	window.onload = function(){		
		document.getElementsByClassName('phone')[0].value = mtel(document.getElementsByClassName('phone')[0].value);	
					
		$(document).on('keyup', '.phone', function(){
			$(this).val(mtel($(this).val()));
			mascara( this, mtel );
		});		
	}
    
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header" style="font-weight:bold;color:black;font-size:14pt;text-shadow: 2px 2px 2px slategrey;">Registro de Clientes</div>

                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active cadastro" id="cad_ativo" href="#">Cadastro</a>
                                <a class="nav-link cadastro" id="cad_inativo" href="#">Cadastro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active busca" id="busca_ativa" href="#">Buscar</a>
                                <a class="nav-link busca" id="busca_inativa" href="#">Buscar</a>
                            </li>
                            @if($pessoa->id)
                            <a style="background:none;text-align:right;width:510px;margin-top:6px" onclick="abrir('../endereco');return false" href="">Endereço <i class="fa fa-plus-circle" aria-hidden="true"></i></a>                     
                            @endif   
                        </ul>
                        
                    </div>

                    <div class="card-body" id="tela_cad">                        
                        <form action="{{ route('cadastrar') }}" id="cad" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$pessoa->id}}">
                            <label>Nome da Empresa</label>
                            <input type="text" class="form-control form-control-sm inputs" maxlength="30" name="empresa" value="{{$pessoa->nome_empresa}}">
                            <br/>
                            <div style="position:relative;width:100%;background:none;float:left">
                                <div style="float:left;width:49%;background:none;">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control form-control-sm inputs" id="cnpj" name="cnpj" value="{{$pessoa->cnpj}}" aria-describedby="emailHelp">
                                </div>
                                <div style="float:right;width:49%;background:none;">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control form-control-sm inputs phone" maxlength="15" id="tel" name="tel" value="{{$pessoa->telefone}}" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <br/><br/><br/>
                            <label>Nome do Responsável</label>
                            <input type="text" class="form-control form-control-sm inputs" maxlength="30" name="responsavel" value="{{$pessoa->responsavel}}" aria-describedby="emailHelp">
                            <br/>
                            <label>E-mail</label>
                            <input type="email" class="form-control form-control-sm inputs" name="email" maxlength="25" value="{{$pessoa->email}}" aria-describedby="emailHelp">
                            <br/>
                            <div id="botao">
                                @if($acao == "editar")
                                <input type="button" value="Alterar" id="alterar" class="btn btn-primary">
                                <input type="button" value="Novo" id="novo" class="btn btn-primary">
                                @endif
                                @if($acao != "editar")
                                <input type="submit" value="Salvar" class="btn btn-success">
                                @endif
                            </div>
                        </form>
                    </div>

                    <div class="card-body" id="tela_busca">                        
                        <div style="width:100%;height:367px;background:none;">
                        <form action="{{ route('buscar') }}" id="busca" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cliente</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="cliente" value="{{$busca}}" id="cliente" placeholder="Todos">
                                </div>
                                <div class="input-group-append">
                                <button class="btn btn-primary" id="buscando" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                </div>
                            </div>
                            <div style="height:320px;background:none;overflow:auto">
                                <table class="table" width="90%">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">E-Mail</th>
                                        </tr>
                                    </thead>
                                    <tbody style="height:200px;background:none;">
                                        @if($result)
                                            @foreach($result as $resu)                                        
                                                <tr>
                                                <th scope="row"><a href="visualisar/{{$resu->id}}">{{$resu->id}}</a></th>
                                                <td><a href="visualisar/{{$resu->id}}">{{$resu->nome_empresa}}</a></td>
                                                <td><a href="visualisar/{{$resu->id}}">{{$resu->telefone}}</a></td>
                                                <td><a href="visualisar/{{$resu->id}}">{{$resu->email}}</a></td>
                                                </tr>
                                            @endforeach
                                        @endif                                 
                                    </tbody>
                                </table>     
                            </div>
                        </form>                   
                        </div>
                    </div>
                    
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
