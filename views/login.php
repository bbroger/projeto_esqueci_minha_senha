<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/labels.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/styles.css">
</head>

<body class="bg">
    <div class="overlay">
        <div class="container">
            <div class="panel shadow-sm" id="form-login">
                <div class="panel-header">
                    <h1>Acesso ao sistema</h1>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="form-label-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-label-group">
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Sua senha">
                        <label for="senha">Sua senha</label>
                    </div>
                    <div class="form-label-group">
                        <button type="submit" class="btn btn-info btn-block">Acessar</button>
                    </div>
                    <div class="form-label-group">
                        <div class="text-center">
                            <a href="#">Esqueci a senha</a>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['sucesso'])) : ?>
                        <div class="form-group">
                            <small class="text-success"><?php echo $_SESSION['sucesso'] ?></small>
                        </div>
                    <?php unset($_SESSION['sucesso']);
                    endif; ?>
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="form-group">
                            <small class="text-danger"><?php echo $_SESSION['error'] ?></small>
                        </div>
                    <?php unset($_SESSION['error']);
                    endif; ?>
                </div>
            </div>

            <div class="panel shadow-sm" id="forgot-password">
                <div class="panel-header">
                    <h1>Esqueci minha senha</h1>
                    <hr>
                </div>
                <div class="panel-body">
                    <form action="<?php echo BASE_URL ?>usuarios/esqueci" method="post">
                        <div class="form-label-group">
                            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                            <label for="email">E-mail</label>
                        </div>
                        <div class="form-label-group">
                            <button type="submit" class="btn btn-info btn-block">Enviar</button>
                        </div>
                        <div class="form-label-group">
                            <div class="text-center">
                                <a href="#">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo BASE_URL ?>assets/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/scripts.js"></script>
</body>

</html>