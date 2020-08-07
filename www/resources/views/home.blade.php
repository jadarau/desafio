@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de Clientes</div>

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
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
                        </ul>
                    </div>

                    <div class="card-body" id="tela_cad">                        
                        <form action="{{ route('cadastrar') }}" id="cad" method="POST">
                            @csrf
                            <label>Nome da Empresa</label>
                            <input type="text" class="form-control form-control-sm" name="empresa">
                            <br/>
                            <div style="position:relative;width:100%;background:none;float:left">
                                <div style="float:left;width:49%;background:none;">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control form-control-sm" name="cnpj" aria-describedby="emailHelp">
                                </div>
                                <div style="float:right;width:49%;background:none;">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control form-control-sm" name="tel" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <br/><br/><br/>
                            <label>Nome do Responsável</label>
                            <input type="text" class="form-control form-control-sm" name="responsavel" aria-describedby="emailHelp">
                            <br/>
                            <label>email</label>
                            <input type="text" class="form-control form-control-sm" name="email" aria-describedby="emailHelp">
                            <br/>
                            <input type="submit" value="Salvar" class="btn btn-primary">
                        </form>
                    </div>

                    <div class="card-body" id="tela_busca">                        
                        <div style="width:100%;height:367px;background:none">
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
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">E-Mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if($result)
                                    @foreach($result as $resu)
                                        <tr>
                                        <th scope="row">{{$resu->id}}</th>
                                        <td>{{$resu->nome_empresa}}</td>
                                        <td>{{$resu->telefone}}</td>
                                        <td>{{$resu->email}}</td>
                                        </tr>   
                                    @endforeach
                                  @endif                                 
                                </tbody>
                            </table>     
                        </form>                   
                        </div>
                    </div>
                    
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
