<?php
    require_once 'CLASSES/usuarios.php';
    $u = new Usuario;
    $u->conectar("projeto_login","localhost","root","");
    $dado = $u->buscar($_GET['id_usuarios']);
?>



<html lang ="pt-br">
<head>
    <meta charsert="utf-8"/>
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>

<div id="corpo-form-cad"> 
    <h1>Alterar Cadastro</h1>
    <form method="POST">
        <input type="hidden" name="id_usuarios" value="<?=$_GET["id_usuarios"]?>">
        <input type="text" name ="nome" placeholder="Nome Completo" maxlength="30" value="<?=$dado["nome"]?>">
        <input type="text" name ="ano" placeholder="Ano/Turma (Ex: 7ºA)" maxlength="30" value="<?=$dado["ano"]?>">
        <input type="email" name ="email" placeholder="Usuário (e-mail)" maxlength="40" value="<?=$dado["email"]?>">
        <input type="password" name ="senha" placeholder="Senha" maxlength="15" value="<?=$dado["senha"]?>">
        <input type="password" name ="confSenha" placeholder="Confirmar Senha" maxlength="15" value="<?=$dado["senha"]?>">
        <input type="submit" value="ALTERAR">
    </form>
</div>

<?php
//verificar se clicou no botao
if(isset($_POST['nome'])){

    $id_usuarios = addslashes($_POST['id_usuarios']);
    $nome = addslashes($_POST['nome']);
    $ano = addslashes($_POST['ano']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);
    //verificar se não está vazio
    if(!empty($nome) && !empty($ano) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){

        if($u->msgErro == ""){
            if($senha == $confirmarSenha){
                //$u->remover(id_usuario);
                if($u->alterar($id_usuarios, $nome, $ano, $email, $senha)){
                    echo "Alterado com sucesso! Acesse para entrar";
                }
                else{
                    echo "usuário não existe!";
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