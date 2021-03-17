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

    <h1>Lista de Vendas</h1>

    <hr />

    <section class="articles_list mt-5">

        <article class="mb-5">

            <?php echo $vendas; ?>

        </article>

    </section>

    <a href="{{ url('/vendedores')  }}" class="btn btn-primary">Listar Vendedores</a>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
