<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/cdn.datatables.net_1.10.20_js_jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/ajax_googleapis_com_ajax_libs_jquery_3.4.1_jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('js/cdnjs.cloudflare.com_ajax_libs_popper.js_1.14.3_umd_popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/code.jquery.com_jquery-1.11.1.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('js/code.jquery.com_ui_1.11.1_jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jQueryMask/dist/jquery.mask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jQueryMask/dist/jquery.mask.min.js') }}" type="text/javascript"></script> 
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <title>Cadastro de Endereço</title> 

    </head>
<body>
<script>
    $('#cep').mask('99999-999');
</script>
    <div id="corpo" style="background:none;width:90%;height:380px;margin-left:5%">
        <div id="form">
            <form>
                <div class="form-group">
                    <label >CEP</label>
                    <input type="text" id="cep" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Logradouro</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Complemento</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nº</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cidade</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Bairro</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                
                <div class="form-group form-check">                
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Principal</label>
                <button type="submit" style="float:right" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>

    </div>
</body>