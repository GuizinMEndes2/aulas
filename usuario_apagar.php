<?php
    require('twig_carregar.php');
    require('pdo.inc.php'); //conexão com o banco


    //rotina de Post = apagar o usuário
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Modifico o usuário para ativo = 0
    $id = $_POST['id'] ?? false;
    if($id) {
        $sql = $pdo->prepare('UPDATE usuarios SET ativo = 0 where id = ?');
        $sql->execute([$id]);       
    }
    header('location:usuarios.php');
    die;
    }

    //rotina de Get - Mostrar informações na tele


    //Busca o usuário no banco para mostrar o  nome dele na tela



    $id = $_GET['id'] ?? false;
    $sql = $pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
    $sql->execute([$id]);
    $usuario = $sql->fetch(PDO::FETCH_ASSOC);




    echo $twig->render('usuario_apagar.html', [
        'usuario'=>$usuario,
    ]);
