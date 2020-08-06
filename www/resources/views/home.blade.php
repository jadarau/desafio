@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Controle de Clientes</div>

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
                                <a class="nav-link active" id="cad_ativo" href="#">Cadastro</a>
                                <a class="nav-link" id="cad_inativo" href="#">Cadastro</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  active id="busca_ativa" href="#">Buscar</a>
                                <a class="nav-link" id="busca_inativa" href="#">Buscar</a>
                            </li>                        
                        </ul>
                    </div>
                    <div class="card-body">

                        
                        <form action="{{ route('cadastrar') }}" method="POST">
                            @csrf
                            <label>Nome da Empresa</label>
                            <input type="text" class="form-control form-control-sm" name="empresa" aria-describedby="emailHelp">
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
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
