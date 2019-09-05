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
            <div class="panel shadow-sm">
                <div class="panel-header">
                    <h1>Tudo certo!</h1>
                </div>
                <div class="panel-body">
                    <p>Enviamos um e-mail a <?php echo $email ?> com as instruções necessárias para recuperar sua senha.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo BASE_URL ?>assets/js/jquery.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL ?>assets/js/scripts.js"></script>
</body>

</html>