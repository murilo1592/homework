<?php

/*
 *
 * VENDEDORES
 */

Route::get('/', 'Vendedores@show');

Route::view('/form-vendedor', 'form-vendedores');
Route::get('/vendedores', 'Vendedores@show');
Route::post('/vendedores', 'Vendedores@createVendedor');

/*
 *
 * VENDAS
 */
Route::get('/vendedor/{vendedorId}/criar-venda', 'Vendas@formVenda');
Route::get('/vendas', 'Vendas@show');
Route::get('/vendas-vendedor/{vendedorId}/', 'Vendas@vendasVendedor');
Route::post('/venda/{vendedorId}', 'Vendas@createVenda');
