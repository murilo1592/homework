<?php

namespace HomeWork\Http\Controllers;

use Illuminate\Http\Request;
use HomeWork\Venda;
use HomeWork\Vendedor;

class Vendas extends Controller
{

    public function show()
    {
        $vendas = Venda::all();

        $html = "";

        foreach ($vendas as $venda) {

            $vendedor = Vendedor::firstOrNew([
                'id' => $venda->vendedor_id
            ]);

            $valorVenda = number_format($venda->valor_venda, 2, ',', '.');
            $comissao = number_format($venda->comissao, 2, ',', '.');

            $html .= "<h4><b>Vendedor:</b> {$vendedor->nome}</h4>";
            $html .= "<h5><b>Email:</b> R$ {$vendedor->email}</h5>";
            $html .= "<h5><b>Valor da Venda:</b> R$ {$valorVenda}</h5>";
            $html .= "<h5><b>Comissão:</b> R$ {$comissao}</h5>";

            $html .= "<small>Criado em: <b>{$venda->created_at}</b> - Editado em: <b>{$venda->updated_at}</b> </small>";

            $html .= "<a href=" . url('/vendedor/' . $venda->vendedor_id . '/criar-venda') . " class='btn btn-sm btn-primary' style=' margin-left:8px; color:white;'>Lançar nova venda</a>";


            $html .= "<hr />";
        }

        return view('vendas', ['vendas' => $html]);
    }

    public function vendasVendedor($vendedorId)
    {
        $vendas = Venda::where('vendedor_id', '=', $vendedorId)->get();

        $html = "";

        $vendedor = Vendedor::firstOrNew([
            'id' => $vendedorId
        ]);

        $totalVenda = 0;
        $totalComissao = 0;

        foreach ($vendas as $venda) {

            $valorVenda = number_format($venda->valor_venda, 2, ',', '.');
            $comissao = number_format($venda->comissao, 2, ',', '.');

            $html .= "<h5><b>Valor da Venda:</b> R$ {$valorVenda}</h5>";
            $html .= "<h5><b>Comissão:</b> R$ {$comissao}</h5>";

            $html .= "<small>Criado em: <b>{$venda->created_at}</b> - Editado em: <b>{$venda->updated_at}</b> </small>";

            $html .= "<hr />";

            $totalVenda = $totalVenda + $venda->valor_venda;
            $totalComissao = $totalComissao + $venda->comissao;
        }

        return view('vendas-vendedor', [
            'vendas' => $html,
            'vendedor' => $vendedor->nome,
            'totalVendas' => number_format($venda->valor_venda, 2, ',', '.'),
            'totalComissao' => number_format($venda->comissao, 2, ',', '.')
        ]);
    }

    public function formVenda($vendedorId)
    {
        return view('form-venda', ['vendedorId' => $vendedorId]);
    }

    public function list()
    {
        $vendas = Venda::all();

        $retorno = [];

        foreach ($vendas as $venda) {

            $vendedor = Vendedor::firstOrNew([
                'id' => $venda->vendedor_id
            ]);

            $retorno[] = [
                'id' => $venda->id,
                'nome' => $vendedor->nome,
                'email' => $vendedor->email,
                'comissao' => $venda->comissao,
                'valor_venda' => $venda->valor_venda,
                'data_venda' => date('Y-m-d H:i:s', strtotime($venda->created_at))
            ];
        }

        die(json_encode($retorno));
    }

    public function orders(Request $request, $vendedorId)
    {
        $venda = new Venda();

        $venda->vendedor_id = $vendedorId;
        $venda->valor_venda = $request->valor_venda;
        $venda->comissao = ($request->valor_venda / 100) * 8.5;

        $venda->save();

        $vendedor = Vendedor::firstOrNew([
            'id' => $vendedorId
        ]);

        unset($venda);

        $venda = Venda::lastOrNew();

        die(json_encode([
            'id' => $venda->id,
            'nome' => $vendedor->nome,
            'email' => $vendedor->email,
            'comissao' => $venda->comissao,
            'valor_venda' => $venda->valor_venda,
            'data_venda' => date('Y-m-d H:i:s', strtotime($venda->created_at))
        ]));
    }

    public function createVenda(Request $request, $vendedorId)
    {
        $venda = new Venda();

        $venda->vendedor_id = $vendedorId;
        $venda->valor_venda = $request->valor_venda;
        $venda->comissao = ($request->valor_venda / 100) * 8.5;

        $venda->save();

        return $this->show();
    }
}
