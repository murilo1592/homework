<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HomeWork - Vendas</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
'
<div class="container my-5">

    <h1>Formulário - Nova Venda</h1>

    <form action="{{ url('/venda', ['vendedorId' => $vendedorId])}}" method="POST" autocomplete="off">

        {{-- Token para envio de POST --}}
        @csrf

        {{-- Envio de Verbo HTTP: PUT, DELETE ou PATCH --}}
        {{--@method('DELETE')--}}

        <div class="form-group">

            <label for="valor_venda">Valor da Venda
                <br/>
                <b>Obs: "Para cada venda é cobrado 8.5% de comissão !! </b></label>
            <input type="text" class="form-control mt-1" name="valor_venda" id="valor_venda"
                   placeholder="Digite aqui o Valor"/>
        </div>

        <button class="btn btn-primary">Enviar</button>

    </form>

    <a href="{{url('/vendas')}}" class="btn btn-success mt-5">Listar Vendas</a>

    <a href="{{url('/vendedores')}}" class="btn btn-primary mt-5">Listar Vendedores</a>

</div>

<script src="{{ asset('js/app.js')  }}"></script>
</body>
</html>
