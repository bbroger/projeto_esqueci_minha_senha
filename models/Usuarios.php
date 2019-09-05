<?php

use PHPMailer\PHPMailer\Exception;

class Usuarios extends Model
{
    private $id;
    private $email;
    private $senha;
    private $token;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            return false;
        }

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }


    public function validarCadastro($email)
    {
        try {
            $sql = $this->db->prepare("SELECT id FROM usuarios WHERE email = :email");
            $sql->execute(array(
                ':email' => $email
            ));
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function cadastrarToken($id, $hash)
    {
        try {
            $sql = $this->db->prepare("INSERT INTO token_usuarios (idusuario, token) VALUES (:idusuario, :token)");
            $sql->execute(array(
                ':idusuario' => $id,
                ':token' => $hash
            ));
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function verificarToken($token)
    {
        try {
            $sql = $this->db->prepare("SELECT * FROM token_usuarios WHERE token = :token AND used = 0");
            $sql->execute(array(
                ':token' => $token
            ));
            if ($sql->rowCount() > 0) {
                return $sql->fetch();
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function alterarSenha($id, $senha, $token)
    {
        try {
            $sql = $this->db->prepare("UPDATE usuarios SET senha = :senha WHERE id = :id");
            if ($sql->execute(array(
                ':senha' => $senha,
                ':id' => $id
            )) == true) {
                $sql = $this->db->prepare("UPDATE token_usuarios SET used = 1 WHERE token = :token");
                $sql->execute(array(
                    ':token' => $token
                ));
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
