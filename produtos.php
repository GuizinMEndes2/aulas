<?php 
require('vendor/autoload.php');

$loader = new \Twig\Loader\FilesystemLoader('./templates');

$twig = new \Twig\Environment($loader);

$template = $twig-> load('produtos.html');
$produtos= [
[    
    'nome' => 'Chinelo',
    'preco' => 30,
],
    [
    'nome' => 'camiseta',
    'preco' => 50,
    ],
    [
        'nome'=> 'boné',
        'preco'=> 29.9
    ],
    [
        'nome' => 'lancha',
        'preco'=> '100000000000'
    ]
];

echo $template->render ([
    'titulo' => 'produtos',
    //'produtos' => $produtos,
    'produtos' => null,
]);