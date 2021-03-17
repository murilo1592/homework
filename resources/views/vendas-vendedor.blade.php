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

    <h2>Vendedor &raquo; <?php echo $vendedor; ?></h2>

    <h5>Minhas Vendas</h5>

    <small>
        <b>Total Vendas:</b> <?php echo $totalVendas;?>
        &raquo;
        <b>Total Comissão:</b> <?php echo $totalComissao;?>
    </small>

    <hr/>

    <a href="{{ url('/vendedores')  }}" class="btn btn-primary">Listar Vendedores</a>

    <a href="{{ url('/form-vendedor')  }}" class="btn btn-success">Novo Vendedor</a>

    <section class="articles_list mt-5">

        <article class="mb-5">

            <?php echo $vendas; ?>

        </article>

    </section>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
