<?php 

namespace App\Entity;

use App\DB\Database;
use \PDO;


class Endereco {

    /**
     * Identificador do endereço
     * @var integer
     */
    public $id;

    /**
     * Identificador do cliente
     * @var integer
     */
    public $idCliente;

    /**
     * CEP
     * @var string
     */
    public $cep;

    /**
     * Endereço
     * @var string
     */
    public $endereco;

    /**
     * Numero do endereço
     * @var string
     */
    public $numero;

    /**
     * Bairro do endereço
     * @var string
     */
    public $bairro;

    /**
     * Cidade do endereço
     * @var string
     */
    public $cidade;

    /**
     * Estado do endereço
     * @var string
     */
    public $estado;

    /**
     * Metodo responsável por cadastrar um novo endereço no banco
     * @return boolean
     */
    public function cadastrar()
    {
        $obDatabase = new Database('enderecos');
        $this->id   = $obDatabase->insert(
                                    [
                                        'idCliente' => $this->idCliente,
                                        'cep'       => $this->cep,
                                        'endereco'  => $this->endereco,
                                        'numero'    => $this->numero,
                                        'bairro'    => $this->bairro,
                                        'cidade'    => $this->cidade,
                                        'estado'    => $this->estado,
                                    ]);
        return true;
    }

    /**
     * Metodo responsável por buscar um endereço com base na condição
     * @param integer id
     * @return Endereco
     */
    public static function getEndereco(int $id)
    {
        return (new Database('enderecos'))->select('id = '.$id)->fetchObject(self::class);
    } 

    /**
     * Metodo responsável por atualizar o cliente no banco
     * @return boolean
     */

     public function atualizar()
     {
         return (new Database('enderecos'))
                         ->update(
                             'id = '.$this->id, 
                             [
                                'cep'       => $this->cep,
                                'endereco'  => $this->endereco,
                                'numero'    => $this->numero,
                                'bairro'    => $this->bairro,
                                'cidade'    => $this->cidade,
                                'estado'    => $this->estado,
                             ]);
     }
 
     /**
      * Metodo responsável por exluir o endereço no banco
      * @return boolean
      */
      public function excluir()
      { 
          return (new Database('enderecos'))->delete('id = '.$this->id);
      }
 
     /**
      * Metodo responsável por obter os endereços de um Cliente no banco de dados
      * @param string where
      * @param string order
      * @param string limit
      * @return array
      */
     public static function getEnderecos(string $where = null, string $order = null, int $limit = null)
     {
         return (new Database('enderecos'))
                         ->select('idCliente = '.$where, $order, $limit)
                         ->fetchAll(PDO::FETCH_CLASS,self::class);
     }

}