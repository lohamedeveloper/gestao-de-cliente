<?php 

namespace App\DB;

use \PDO;
use \PDOException;


class Database {

    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST = '';

    /**
     * Usuario do banco de dados
     * @var string
     */
    const USER = '';

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASSWORD = '';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = '';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private string $table;

    /**
     * Instancia de conexão com banco de dados
     * @var PDO
     */
    private $conn;

    /**
     * Define a tabela e instância de conexão
     */
    public function __construct(string $table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Metodo responsável por criar uma conexão com banco de dados
     */
    private function setConnection()
    {
        try {
            $this->conn = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
        
            die('ERROR DE CONEXÃO COM BANCO DE DADOS: Veririca seus dados');
        }
    }

    /**
     * Metodo responsável para executar a query dentro do banco
     * @param string $query
     * @param array  $params
     * @return PDOStatement
     */

     public function execute($query, $params = [])
     {
        try {
            
            $statement = $this->conn->prepare($query);
            $statement->execute($params);
            return $statement;

        }catch(PDOException $e){

            die('ERRO AO EXECUTAR QUERY: Veririca seus dados'.$e->getMessage());
        }
     }

    /**
     * Metodo responsável para inserir dados na tabela
     * @param array    $values [fied => value]
     * @return integer $id inserido
     */
    public function insert($values)
    {
        $fields = array_keys($values);
        $binds  = array_pad([], count($fields), '?'); 

        $query = 'insert into '.$this->table.'('.implode(',',$fields).')values('.implode(',',$binds).');';

        //executa o insert
        $this->execute($query, array_values($values));

        //returna o id inserido
        return $this->conn->lastInsertId();
    }

    /**
     * Metodo responsável por executar uma consulta no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') 
    {
        $where = strlen($where) ? ' where '.$where      : '';
        $order = strlen($order) ? ' order by '.$order   : '';
        $limit = strlen($limit) ? ' limit '.$limit      : '';

        $query = 'select '.$fields.' from '.$this->table.' '.$where.' '.$order.' '.$limit;
        //executar e select e depois retorna
        return $this->execute($query);
    }


    /**
     * Metodo responsável por executar a atualização no banco
     * @param string $where
     * @param array  $values [fied => value]
     * @return boolean
     */
    public function update($where, $values)
    {
        $fields = array_keys($values);
        
        $query = 'update '.$this->table. ' SET ' . implode('=?,', $fields). '=? where '. $where;
        //executar update
        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Metodo responsável por executar a exclusão no banco
     * @param string $where
     * @return boolean
     */
    public function delete($where)
    {   
        $query = 'delete from '.$this->table. ' where '.$where;
        //executar delete
        $this->execute($query);

        return true;
    }

}