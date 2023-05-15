<?php 

namespace App\Entity;

use App\DB\Database;

class Usuario {

    /**
     * Identificador do usuário
     * @var integer
     */
    public $id;

    /**
     * Nome do usuário
     * @var string
     */
    public $nome;

    /**
     * Email do usuário
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuário
     * @var string
     */
    public $senha;

    /**
     * Data de cadastro do usuário
     * @var string
     */
    public $data;

    /**
     * Metodo responsável por cadastrar um novo usário no banco
     * @return boolean
     */

    public function cadastrar()
    {
        $obDatabase = new Database('usuarios');
        $this->id   = $obDatabase->insert(
                                    [
                                        'nome'  => $this->nome,
                                        'email' => $this->email,
                                        'senha' => $this->senha,
                                    ]);
        return true;
    }

    /**
     * Metodo responsável por retornar uma instância com base em seu email
     * @param  string $email
     * @return Usuario
     */
    public static function getUsuarioEmail($email)
    {
        return (new Database('usuarios'))
                    ->select('email = "'.$email.'"')
                    ->fetchObject(self::class);
    } 
}