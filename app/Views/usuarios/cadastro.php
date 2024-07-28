<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema Agenda Eletrônica</title>
    <style>
        body {
            background-color: #F2F2F2;
        }
        .login {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3>Cadastro</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('usuarios/cadastro') ?>" method="POST">
                                <div>
                                    <div class="mb-3">
                                        <label>Login</label>
                                        <input type="text" name="login" class="form-control" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                    <label>Senha</label>
                                    <input type="password" name="senha" class="form-control" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>