<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Endereco; 
use \App\Session\Login;

//obriga usuário estar logado
Login::requireLogin();

// validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

//consulta endereço
$obCliente = Endereco::getEndereco($_GET['id']);


if(!$obCliente instanceof Endereco){
    header('location: index.php?status=error');
    exit;
}

//validação 
if(isset($_POST['excluir'])){    

    $obCliente->excluir();

    if($obCliente->atualizar()){
        header('location: index.php?status=success');
        exit;
    }
}

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/endereco/confirmar_exclusao.php';
include __DIR__.'/includes/head/footer.php';