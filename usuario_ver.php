<?php 
require('verifica_login.php');
require('twig_carregar.php');

require('models/Model.php');
require('models/Usuario.php');

$id = $_GET['id'] ?? false;

$usr = new Usuario();
$info = $usr->GetById($id);
var_dump($info); 
die;


echo $twig->render('usuario_ver.html',[
]);