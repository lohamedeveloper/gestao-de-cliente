<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Cliente');

use \App\Entity\Cliente; 
use \App\Session\Login;


//obriga usuário estar logado
Login::requireLogin();


// validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'] )){
    header('location: index.php?status=error');
    exit;
}

//consulta cliente
$obCliente = Cliente::getCliente($_GET['id']);

if(!$obCliente instanceof Cliente){
    header('location: index.php?status=error');
    exit;
}

if(isset($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['dataNascimento'], $_POST['telefone'])){

    $obCliente->nome            = $_POST['nome'];
    $obCliente->cpf             = $_POST['cpf'];
    $obCliente->rg              = $_POST['rg'];
    $obCliente->dataNascimento  = $_POST['dataNascimento'];
    $obCliente->telefone        = $_POST['telefone'];
    
    if($obCliente->atualizar()){
        header('location: index.php?status=success');
        exit;
    }
}

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/cliente/formulario_cliente.php';
include __DIR__.'/includes/head/footer.php';