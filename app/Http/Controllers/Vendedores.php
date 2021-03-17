<?php

namespace HomeWork\Http\Controllers;

use HomeWork\Vendedor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class Vendedores extends Controller
{
    public function show()
    {
        $vendedores = Vendedor::all();

        $html = "";

        foreach ($vendedores as $vendedor) {

            $dataCriacao = date('Y-m-d H:i', strtotime($vendedor->created_at));
            $dataAtualizacao = date('Y-m-d H:i', strtotime($vendedor->updated_at));

            $html .= "<h3><b>Vendedor:</b> {$vendedor->nome}</h3>";
            $html .= "<h5><b>Email:</b> {$vendedor->email}</h5>";
            $html .= "<small>Criado em: <b>{$dataCriacao}</b> - Editado em: <b>{$dataAtualizacao}</b> </small>";

            $html .= "<a href=" . url('/vendedor/' .$vendedor->id. '/criar-venda') . " class='btn btn-sm btn-success' style=' margin-left:8px; color:white;'>Lançar nova venda</a>";
            $html .= "<a href=" . url('vendas-vendedor/' . $vendedor->id) . " class='btn btn-sm btn-primary' style=' margin-left:8px; color:white;'>Listar Vendas</a>";


            $html .= "<hr />";
        }

        return view('vendedores', ['vendedores' => $html]);
    }

    public function list()
    {
        $vendedores = Vendedor::all();

        die(json_encode($vendedores));
    }

    public function seller(Request $request)
    {
        $vendedor = new Vendedor();

        $vendedor->nome = $request->nome;
        $vendedor->email = $request->email;

        $vendedor->save();

        $retorno = Vendedor::firstOrNew([
            'email' => $vendedor->email
        ]);

        die(json_encode($retorno));
    }

    public function create(Request $resquest)
    {
        $vendedor = new Vendedor();

        $vendedor->nome = $resquest->nome;
        $vendedor->email = $resquest->email;

        $vendedor->save();

        $result = Vendedor::firstOrNew([
            'email' => $vendedor->email
        ]);

        die(json_encode([
            'id ' => $result->id,
            'nome' => $result->nome,
            'email' => $result->email
        ]));
    }

    public function createVendedor(Request $resquest)
    {
        $vendedor = new Vendedor();

        $vendedor->nome = $resquest->nome;
        $vendedor->email = $resquest->email;

        $vendedor->save();

        return $this->show();
    }

}
