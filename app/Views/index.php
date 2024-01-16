<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <h1 class="navbar-brand">2° Guerra Mundial</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="mt-3 nav-link active btn btn-outline-primary" aria-current="page">Adicionar consequência</button>
                </div>
            </div>
        </div>
    </nav>

    <?php
    if (session()->getFlashdata('status') === "error") {
        echo '<div class="alert alert-danger" role="alert">
                            Não foi possível cadastrar o consequência!
                        </div>';
    };
    if (session()->getFlashdata('status') === "sucesso") {
        echo '<div class="alert alert-success" role="alert">
                            consequência castrado!
                        </div>';
    };
    if (session()->getFlashdata('status') === "delete") {
        echo '<div class="alert alert-info" role="alert">
                            consequência deletado!
                        </div>';
    };
    if (session()->getFlashdata('status') === "notdelete") {
        echo '<div class="alert alert-warning" role="alert">
                            Erro ao deletar o consequência!
                        </div>';
    };
    ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('send') ?>" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Consequência</label>
                            <input type="text" class="form-control" name="consequencia" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($consequencia as $item) : ?>
        <div class="card mt-4 mb-3">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div class="mr-auto">
                    <h5 class="card-title">Consequência n°: <?php echo $item['id']; ?></h5>
                    <p class="card-text">Consequência: <?php echo $item['consequencia']; ?></p>
                    <p class="card-text">Data de Criação: <?php echo $item['user_date_created_account']; ?></p>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url('editar/' . $item['id']) ?>" class="btn btn-primary mr-2">Editar dados</a>
                    <a href="<?= base_url('delete/' . $item['id']) ?>" class="btn btn-danger">Excluir dados</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        let reloadedRecently = sessionStorage.getItem('reloadedRecently');

        // Se não foi recarregada recentemente, redireciona e define o indicador de recarregamento
        if (!reloadedRecently) {
            sessionStorage.setItem('reloadedRecently', 'true');
            window.location.reload(true);
        }
        // Criar um objeto Date usando a string de data e hora
        setTimeout(function() {
            let divToRemove = document.querySelector('.alert');
            if (divToRemove) {
                divToRemove.remove();
            }
        }, 3000); // 3000 milissegundos (3 segundos)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>