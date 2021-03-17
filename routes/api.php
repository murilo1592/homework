<?php

use Illuminate\Http\Request;

/*
 *
 * VENDEDORES
 */
Route::get('/sellers', 'Vendedores@list');
Route::post('/seller', 'Vendedores@seller');

/*
 *
 * VENDAS
 */
Route::get('/orders', 'Vendas@list');
Route::post('/order/{vendedorId}', 'Vendas@orders');
