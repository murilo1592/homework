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

    <h1>Formulário de Cadastro - Vendedores</h1>

    <form action="{{ url('/vendedores')  }}" method="POST" autocomplete="off">

        {{-- Token para envio de POST --}}
        @csrf

        {{-- Envio de Verbo HTTP: PUT, DELETE ou PATCH --}}
        {{--@method('DELETE')--}}

        <div class="form-group">

            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite aqui o Valor"/>
        </div>

        <div class="form-group">

            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite aqui o Valor" />
        </div>

        <button class="btn btn-primary">Enviar</button>

    </form>

    <a href="{{url('/vendedores')}}" class="btn btn-success mt-5">Listar Vendedores</a>

</div>

<script src="{{ asset('js/app.js')  }}"></script>
</body>
</html>
