<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $result = "";
        $acao = "";
        $busca = "";
        $pessoa = new Clientes();

        return view('home')->with(array('result'=>$result,'acao'=>$acao,'busca'=>$busca,'pessoa'=>$pessoa));
    }
}
