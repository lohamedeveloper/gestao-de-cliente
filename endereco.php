<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Endereco;
use \App\Session\Login;

//obriga usuário estar logado
Login::requireLogin();

// validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'] )){
    header('location: index.php?status=error');
    exit;
}

//busca de endereços do cliente
$enderecos = Endereco::getEnderecos($_GET['id']);
$idCliente = $_GET['id'];
// var_dump($enderecos); exit;


// if(!$enderecos instanceof Endereco){
//     header('location: index.php?status=error');
//     exit;
// }

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/endereco/listagem.php';
include __DIR__.'/includes/head/footer.php';