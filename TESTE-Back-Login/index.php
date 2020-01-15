<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;

    $u->conectar("projeto_login","localhost","root","");
        
?>

<html lang ="pt-br">
<head>
    <meta charsert="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form"> 

    <h1>Entrar</h1>

    <form method="POST">
        <input type="email" name ="email" placeholder="Usuário">
        <input type="password" name ="senha" placeholder="Senha">
        <input type="submit" value="ACESSAR">
        <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
        <a href="visualizar.php">Visualizar dados cadastrados no banco</a>
    </form>
</div>

<?php

if(isset($_POST['email'])){

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($email)&&!empty($senha)){
        if($u->logar($email,$senha)){
            header("location:areaPrivada.php");           
        }
        else{
            echo "Email e/ou senha incorretos";
        }

    }
    else{
        echo "Preencha todos os campos!";
    }
    
}
?>

</body>

</html>


