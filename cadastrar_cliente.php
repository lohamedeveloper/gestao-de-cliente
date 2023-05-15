<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Cliente');

use \App\Entity\Cliente; 
use \App\Session\Login;

//obriga usuário estar logado
Login::requireLogin();

$obCliente = new Cliente;

if(isset($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['dataNascimento'], $_POST['telefone']) ){

    if(!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['rg']) && !empty($_POST['dataNascimento']) && !empty($_POST['telefone']) ){

        
        $obCliente->nome           = $_POST['nome'];
        $obCliente->cpf            = $_POST['cpf'];
        $obCliente->rg             = $_POST['rg'];
        $obCliente->dataNascimento = $_POST['dataNascimento'];
        $obCliente->telefone       = $_POST['telefone'];

        if($obCliente->cadastrar()){
            header('location: index.php?status=success');
            exit;
        }
    }
    header('location: index.php?status=error');
}

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/cliente/formulario_cliente.php';
include __DIR__.'/includes/head/footer.php';