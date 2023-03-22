<?php  
    require('twig_carregar.php');
    require('pdo.inc.php');
    require('mailer.inc.php');

    //mensagem de erro
    $msg = '';

//se encontrou o usuário

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'] ?? false;

    $sql = $pdo->prepare('SELECT * FROM usuarios where username = ?');
    $sql->execute([$username]);

    if ($sql->rowCount()){

        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        //Aqui fica a rotina de recuperar senha
        //gera um token aleatorio
        $token = uniqid(null, true) . bin2hex(random_bytes(16));
        
        //grava token para o usuario no banco
        $sql = $pdo->prepare('UPDATE usuarios SET recupera_token = :token where id = :id_usr');
        $sql-> execute([
            ':token' => $token,
            ':id_usr' => $usuario['id'],
        ]);

        $msg = 'vai no e-mail!';

        echo $twig->render('email_recupera_senha.html',[
            'token' => $token
        ]);
        die;

    } else {
        $msg = 'ta de zoas? nem tem esse usuário!';


}


}

echo $twig->render('recuperar_senha.html',[
    'msg' => $msg,
]);