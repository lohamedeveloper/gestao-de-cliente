<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Endereço');

use \App\Entity\Endereco; 
use \App\Session\Login;


//obriga usuário estar logado
Login::requireLogin();


// validação do id
if(!isset($_GET['id']) or !is_numeric($_GET['id'] )){
    header('location: index.php?status=error');
    exit;
}

//consulta endereço
$obEndereco = Endereco::getEndereco($_GET['id']);

if(!$obEndereco instanceof Endereco){
    header('location: index.php?status=error');
    exit;
}

if(isset($_POST['cep'], $_POST['endereco'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'])){

    $obEndereco->cep          = $_POST['cep'];
    $obEndereco->endereco     = $_POST['endereco'];
    $obEndereco->numero       = $_POST['numero'];
    $obEndereco->bairro       = $_POST['bairro'];
    $obEndereco->cidade       = $_POST['cidade'];
    $obEndereco->estado       = $_POST['estado'];
    
    if($obEndereco->atualizar()){
        header('location: index.php?status=success');
        exit;
    }
}

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/endereco/formulario_endereco.php';
include __DIR__.'/includes/head/footer.php';