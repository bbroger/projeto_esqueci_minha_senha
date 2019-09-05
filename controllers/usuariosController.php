<?php

class usuariosController extends Controller
{
    public function esqueci()
    {
        if (!empty($_POST['email'])) {
            $usuarios = new Usuarios();
            $usuarios->setEmail(addslashes(strip_tags($_POST['email'])));
            if ($usuarios->getEmail() != false) {
                $result = $usuarios->validarCadastro($usuarios->getEmail());
                if (is_array($result)) {
                    $id = $result['id'];
                    $hash = sha1(time() . rand(0, 9999) . rand(0, 9999));
                    $result = $usuarios->cadastrarToken($id, $hash);
                    if ($result === true) {
                        $email = new Email();
                        $email->addAddress($usuarios->getEmail());
                        $link = BASE_URL . 'usuarios/nova_senha?token=' . $hash;
                        $subject = "Redefinir senha";
                        $message = "<h1 style='font-size: 32px;'>Esqueci minha senha</h1><p>Olá,</p><p>Foi solicitado uma recuperação de senha para este e-mail. Clique <a href='" . $link . "'>aqui</a> para prosseguir com a recuperação.</p>";
                        $email->setMessage($subject, $message);
                        if ($email->sendMessage()) {
                            header("Location:" . BASE_URL . "usuarios/sucesso?email=" . $usuarios->getEmail());
                        } else {
                            $_SESSION['error'] = "Não foi possível enviar o e-mail de recuperação";
                            header("Location:" . BASE_URL);
                        }
                    }
                } else if ($result === false) {
                    $_SESSION['error'] = "E-mail não encontrado";
                    header("Location: " . BASE_URL);
                }
            } else {
                $_SESSION['error'] = 'E-mail inválido';
                header("Location: " . BASE_URL);
            }
        } else {
            $_SESSION['error'] = 'Dados não enviados';
            header("Location: " . BASE_URL);
        }
    }

    public function sucesso()
    {
        $dados['email'] = $_GET['email'];
        $this->loadView('sucesso', $dados);
    }

    public function nova_senha()
    {
        $usuarios = new Usuarios();
        $result = $usuarios->verificarToken($_GET['token']);
        if (is_array($result)) {
            $dados['idusuario'] = $result['idusuario'];
            $dados['token'] = $_GET['token'];
            $this->loadView('nova-senha', $dados);
        } else {
            $_SESSION['error'] = 'Token inválido ou já utilizado';
            header("Location: " . BASE_URL);
        }
    }

    public function redefinir()
    {
        if (!empty($_POST['senha']) && !empty($_POST['token']) && !empty($_POST['idusuario'])) {
            $usuarios = new Usuarios();
            $usuarios->setId(addslashes(strip_tags($_POST['idusuario'])));
            $usuarios->setSenha(addslashes(strip_tags($_POST['senha'])));
            $usuarios->setToken(addslashes(strip_tags($_POST['token'])));
            $result = $usuarios->alterarSenha($usuarios->getId(), $usuarios->getSenha(), $usuarios->getToken());
            if ($result === true) {
                $_SESSION['sucesso'] = "Senha atualizada com sucesso";
                header("Location: " . BASE_URL);
            } else {
                $_SESSION['error'] = "Erro ao atualizar sua senha. Tente novamente ou contate nosso suporte";
                header("Location: " . BASE_URL);
            }
        } else {
            $_SESSION['error'] = 'Dados inválidos. Preencha a senha e envie novamente';
            header("Location: " . BASE_URL);
        }
    }
}
