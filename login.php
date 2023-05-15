<?php 

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

//obriga usuário estar logout
Login::requireLogout();

//mensagens de alerta dos formulários
$alertaLogin    = '';
$alertaCadastro = '';

//validação do post
if(isset($_POST['acao'])){

    switch($_POST['acao']){

        case 'logar':

            $obUsuario = Usuario::getUsuarioEmail($_POST['email']);
            
            if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)){
                $alertaLogin = 'Email ou Senha inválidos';
                break;
            }
            
            //loga usuário
            Login::login($obUsuario);

            break;
        
        case 'cadastrar':
            
            //validando os campos
            if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])){

                if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){

                    $obUsuario = Usuario::getUsuarioEmail($_POST['email']);
                    
                    if($obUsuario instanceof Usuario){
                        $alertaCadastro = 'O email informado já está em uso';
                        break;
                    }

                    //novo usuário
                    $obUsuario        = new Usuario;
                    $obUsuario->nome  = $_POST['nome'];
                    $obUsuario->email = $_POST['email'];
                    $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    
                    $obUsuario->cadastrar();  
                    
                    //loga usuário
                    Login::login($obUsuario);
                }
            }

            break;
    }

}

include __DIR__.'/includes/head/header.php';
include __DIR__.'/includes/login/formulario_login.php';
include __DIR__.'/includes/head/footer.php';