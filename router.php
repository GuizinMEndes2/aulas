<?php 

$pagina = $_GET['pagina'] ?? false;

require filter_var("{$pagina}.php", 
FILTER_SANITIZE_STRING);

if (!file_exists($include)) {
    echo 'Seu rraker!';
    die;
}
require($include);

