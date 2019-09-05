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
                    <form action="<?php echo BASE_URL ?>usuarios/redefinir" method="post">
                        <input type="hidden" name="idusuario" value="<?php echo $idusuario ?>">
                        <input type="hidden" name="token" value="<?php echo $token ?>">
                        <div class="form-label-group">
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Nova senha" required>
                            <label for="senha">Nova senha</label>
                        </div>
                        <div class="form-label-group">
                            <button type="submit" class="btn btn-info btn-block">Alterar senha</button>
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