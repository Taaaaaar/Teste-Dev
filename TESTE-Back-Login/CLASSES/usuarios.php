<?php

class Usuario{

    private $pdo;
    public $msgErro ="";

    public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        global $msgErro;
        try{    
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);

        }catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function buscar($id) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM  usuarios WHERE id_usuarios = :e"); //'e' é o valor digitado no cadastro
        $sql->bindValue(":e", $id);
        $sql->execute();
        return $sql->fetch();
    }

    public function cadastrar($nome, $ano, $email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT  id_usuarios FROM  usuarios WHERE email = :e"); //'e' é o valor digitado no cadastro
        $sql->bindValue(":e", $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            return false; //ja esta cadastrado
        }
        else{
            $sql= $pdo->prepare("INSERT INTO usuarios (nome, ano, email, senha) VALUES (:n, :a, :e, :s)");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":a", $ano);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));

            $sql->execute();
            return true;//cadastrado com sucesso
        }
    }

    public function alterar($id_usuarios, $nome, $ano, $email, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT  id_usuarios FROM  usuarios WHERE id_usuarios = :e"); //'e' é o valor digitado no cadastro
        $sql->bindValue(":e", $id_usuarios);
        $sql->execute();
        if($sql->rowCount() == 0){
            return false; // usuario nao existe
        }
        else{
            $sql= $pdo->prepare("UPDATE usuarios SET nome = :n, ano = :a, email = :e, senha = :s WHERE id_usuarios = :i");
            $sql->bindValue(":i", $id_usuarios);
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":a", $ano);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", md5($senha));

            $sql->execute();
            return true;//cadastrado com sucesso
        }
    }

    public function remover($id_usuario){
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM  usuarios WHERE id_usuarios = :e"); //'e' é o valor digitado no cadastro
        $sql->bindValue(":e", $id_usuario);
        $sql->execute();
        //usuario deletado

    }

    public function lista_todos(){
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM  usuarios" );
        $sql->execute();

        return $sql->fetchAll();
    }

    public function logar($email, $senha){
        global $pdo;
        $sql= $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e && senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();
        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario']= $dado['id_usuario'];
            return true;//possivel logar
        }
        else{
            return false; //nao foi possivel logar
        }
    }
}

?>