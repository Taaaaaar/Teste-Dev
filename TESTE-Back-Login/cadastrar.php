<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
?>



<html lang ="pt-br">
<head>
    <meta charsert="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form-cad"> 
    <h1>Realizar Cadastro</h1>
    <form method="POST">
        <input type="text" name ="nome" placeholder="Nome Completo" maxlength="30">
        <input type="text" name ="ano" placeholder="Ano/Turma (Ex: 7ºA)" maxlength="30">
        <input type="email" name ="email" placeholder="Usuário (e-mail)" maxlength="40">
        <input type="password" name ="senha" placeholder="Senha" maxlength="15">
        <input type="password" name ="confSenha" placeholder="Confirmar Senha" maxlength="15">
        <input type="submit" value="CADASTRAR">
    </form>
</div>

<?php
//verificar se clicou no botao
if(isset($_POST['nome'])){

    $nome = addslashes($_POST['nome']);
    $ano = addslashes($_POST['ano']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //verificar se não está vazio
    if(!empty($nome) && !empty($ano) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
        $u->conectar("projeto_login","localhost","root","");

        if($u->msgErro == ""){
            if($senha == $confirmarSenha){
                //$u->remover(id_usuario);
                if($u->cadastrar($nome, $ano, $email, $senha)){
                    echo "Cadastrado com sucesso! Acesse para entrar";
                }
                else{
                    echo "email já cadastrado!";
                }
            }
            else{
                echo "Senha e Confirmar Senha não correspondem!";
            }
        }
        else{
            echo "Erro: ".$u->msgErro;
        }
    }
    else{
        echo "Preencha todos os campos!";

    }
}

?>

</body>

</html>