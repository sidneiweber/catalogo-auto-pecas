<?php

// CONFIGRAÇÕES DO SITE ####################
//define('HOST', 'localhost');
//define('USER', 'root');
//define('PASS', 'bolacha');
//define('DBSA', 'catalogo');
## Caminhos diretorios
//define('DS', DIRECTORY_SEPARATOR);
//define('ROOT', dirname(__DIR__));

// AUTO LOAD DE CLASSES ####################
function __autoload($classe)
{
    //busca dentro da pasta classes a classe necessaria...
    include_once "Classes/{$classe}.class.php";
}
