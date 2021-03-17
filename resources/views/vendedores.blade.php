<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container my-5">

    <h1>Lista de Vendedores</h1>

    <hr />

    <a href="{{ url('/form-vendedor')  }}" class="btn btn-primary">Criar Vendedor</a>

    <a href="{{ url('/vendas')  }}" class="btn btn-success">Listar Vendas</a>

    <section class="articles_list mt-5">

        <article class="mb-5">

            <?php echo $vendedores; ?>
        </article>

    </section>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
