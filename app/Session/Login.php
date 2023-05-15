<?php 

namespace App\Session;

use \App\Entity\Usuario;

class Login {

    /**
     * Metodo responsável por iniciar a session
     */
    private static function init()
    {
        //verifica status da session
        if(session_start() !== PHP_SESSION_ACTIVE){
            //inicia session
            session_start();
        }
    }


    /**
     * Metodo responsável por retornar os dados do usuário logado
     */
    public static function getUsuariologado()
    {
        self::init();
        // retorna dados do usuário
        return self::isLogged() ? $_SESSION['usuario'] : null;
    } 

    /**
     * Metodo responsável por logar o usuário
     * @param  Usuario
     */
    public static function login($obUsuario)
    {
        //inicia a session
        self::init();
        
        //session do usuário
        $_SESSION['usuario'] = [
            'id'    => $obUsuario->id,
            'nome'  => $obUsuario->nome,
        ];

        //redericiona o usuário
        header('location: index.php');
    }

    /**
     * Metodo responsável por deslogar o usuário
     */
    public static function logout()
    {
        //inicia a session
        self::init();

        //remove a session do usuário
        unset($_SESSION['usuario']);

        header('location: login.php');
        exit;
    }

    /**
     * Metodo responsável de verificar se usuário está logado
     * @return boolean
     */
    public static function isLogged() 
    {
        //inicia a session
        self::init();

        //validação da session
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Metodo responsável por obrigar o usuário a estar logado para acessar
     */
    public static function requireLogin() 
    {
        if(!self::isLogged()){
            header('Location: login.php');
            exit;
        }
    }

    /**
     * Metodo responsável por obrigar o usuário a estar deslogado para acessar
     */
    public static function requireLogout() 
    {
        if(self::isLogged()){
            header('Location: login.php');
            exit;
        }
    }

}