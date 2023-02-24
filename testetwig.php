<?php

require('vendor/autoload.php');

$loader = new \Twig\Loader\FilesystemLoader('./templates');

$twig = new \Twig\Environment($loader);

$template = $twig-> load('teste.html');

echo $template -> render([
    'nome' => 'HENRY',
    'idade' => 16,
    'TITI' => 'OS Guri do inter é FOD*'
]);