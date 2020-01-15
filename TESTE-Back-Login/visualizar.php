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

    <h1>Usuarios no Banco</h1>
    
    <?php 
    if(isset($_POST['id_usuarios'])) {
        if($_POST['submit'] == "REMOVER") {
            $id_usuarios = addslashes($_POST['id_usuarios']);
            $u->remover($id_usuarios);
        } else if($_POST['submit'] == "ALTERAR") {
            header("Location: alterar.php?id_usuarios=".$_POST['id_usuarios']);
        }
    }

    $usuarios  = $u->lista_todos();

    for ($i = 0; $i < count($usuarios); $i++) {
        ?>


            <form method="POST" style="display: flex; justify-content: space-around;">
                <input type="hidden" name="id_usuarios" value="<?= $usuarios[$i]["id_usuarios"] ?>">
                <div><?= $usuarios[$i]["id_usuarios"] ?></div>
                <div><?= $usuarios[$i]["nome"] ?></div>
                <button type="submit" name="submit" value="REMOVER">REMOVER</button>
                <button type="submit" name="submit" value="ALTERAR">ALTERAR</button>

            </form>
        <?php
    }
    ?>
    
</div>
</body>

</html>


