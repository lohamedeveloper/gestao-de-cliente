<?php 

namespace App\Entity;

use \App\DB\Database;
use \PDO;

class Cliente {

    /**
     * Identificado único do cliente
     * @var integer
     */
    public $id;

    /**
     * Nome do cliente
     * @var string
     */
    public $nome;

    /**
     * CPF do cliente
     * @var string
     */
    public $cpf;

    /**
     * RG do cliente
     * @var string
     */
    public $rg;

    /**
     * Data Nascimento do cliente
     * @var string(s/n)
     */
    public $dataNascimento;

    /**
     * Num de telefone do cliente
     * @var string
     */
    public $telefone;

    /**
     * Metodo responsável por cadastrar um cliente no banco
     * @return bool
     */
    public function cadastrar()
    {
        $obDatabase = new Database('clientes');
       
        $this->id  = $obDatabase->insert([
                        'nome'            => $this->nome,
                        'cpf'             => $this->cpf,
                        'rg'              => $this->rg,
                        'dataNascimento'  => $this->dataNascimento,
                        'telefone'        => $this->telefone,
                    ]);

        return true;
    }

     /**
     * Metodo responsável por atualizar o cliente no banco
     * @return boolean
     */

    public function atualizar()
    {
        return (new Database('clientes'))
                        ->update(
                            'id = '.$this->id, 
                            [
                                'nome'            => $this->nome,
                                'cpf'             => $this->cpf,
                                'rg'              => $this->rg,
                                'telefone'        => $this->telefone,
                                'dataNascimento'  => $this->dataNascimento
                            ]);
    }

    /**
     * Metodo responsável por exluir o clientes no banco
     * @return boolean
     */
     public function excluir()
     { 
         return (new Database('clientes'))->delete('id = '.$this->id);
     }

    /**
     * Metodo responsável por obter os Clientes no banco de dados
     * @param string where
     * @param string order
     * @param string limit
     * @return array
     */
    public static function getClientes(string $where = null, string $order = null, int $limit = null)
    {
        return (new Database('clientes'))
                        ->select($where, $order, $limit)
                        ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Metodo responsável por buscar um cliente com base na condição
     * @param integer id
     * @return Cliente
     */
    public static function getCliente(int $id)
    {
        return (new Database('clientes'))->select('id = '.$id)->fetchObject(self::class);
    }
}