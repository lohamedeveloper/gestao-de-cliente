<?php 

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Endereço');

use \App\Session\Login;
use \App\Entity\Endereco; 

//obriga usuário estar logado
Login::requireLogin();

$obEndereco = new Endereco;


if(isset($_POST['cep'], $_POST['endereco'], $_POST['numero'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'])){
    
    if(!empty($_POST['cep']) && !empty($_POST['endereco']) && !empty($_POST['numero']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['estado']) ){
        
        $obEndereco->idCliente    = $_GET['id'];
        $obEndereco->cep          = $_POST['cep'];
        $obEndereco->endereco     = $_POST['endereco'];
        $obEndereco->numero       = $_POST['numero'];
        $obEndereco->bairro       = $_POST['bairro'];
        $obEndereco->cidade       = $_POST['cidade'];
        $obEndereco->estado       = $_POST['estado'];

        if($obEndereco->cadastrar()){
            header('location: index.php?status=success');
            exit;
        }
    }
    header('location: index.php?status=error');
}

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/endereco/formulario_endereco.php';
include __DIR__.'/includes/head/footer.php';