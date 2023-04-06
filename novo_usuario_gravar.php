<?php
require('models/Model.php');
require('models/Usuario.php');
    $nome=$_POST['nome'] ?? false;
    $email=$_POST['email'] ?? false;
    $user=$_POST['user'] ?? false;
    $pass=$_POST['pass'] ?? false;
    $admi=$_POST['admi'] ?? false;
    $ativo=$_POST['ativo'] ?? false;
    
    // print_r($_POST);
    // die;


    if (!$nome || !$email || !$user || !$pass || $ativo){
        header('location:novo_usuario.php');
        die;
    }

    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $usr = new Usuario();
    $usr->create([
        'nome' => $nome,
        'email' => $email,
        'username' => $user,
        'senha' => $pass,
        'admin' => $admi,
        'ativo' => 1,


    ]);


    header('location:usuarios.php');
     
 
