<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use \App\Session\Login;

//obriga usuário estar logado
Login::requireLogin();
   
$clientes = Cliente::getClientes();

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/cliente/listagem.php';
include __DIR__.'/includes/head/footer.php';