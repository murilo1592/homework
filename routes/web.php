<?php

/*
 *
 * VENDEDORES
 */
Route::view('/form-vendedor', 'form-vendedores');
Route::get('/vendedores', 'Vendedores@show');
Route::post('/vendedores', 'Vendedores@createVendedor');

/*
 *
 * VENDAS
 */
Route::get('/vendas', 'Vendas@show');
Route::get('/vendedor/{vendedorId}/criar-venda', 'Vendas@create');
Route::post('/venda/{vendedorId}', 'Vendas@createVenda');
