<?php
    $user = $_POST['user'];
    $pass =$_POST['pass'];

    if ($user=="guizin" && $pass == '1234'){





        session_start();
        $_SESSION['user']='Guizin';
        
        header('location: boasvindas.php');
        die;
    } else {
        header('location: login.php?erro=1');

    }