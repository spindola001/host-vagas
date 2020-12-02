<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Vagas {
    /**
     * Identificador unico da vaga
     * @var integer
     */
    public $vaga_id;
    
    /**
     * Título da vaga
     * @var string
     */
    public $titulo;
    /**
     * Descrição da vaga (pode conter HTML)
     * @var string
     */
    public $descricao;
    /**
     * Status da vaga, que diz se a vaga está ativa ou não
     * @var string (s/n)
     */
    public $status;
    /**
     * Data de publicação da vaga
     *
     * @var string
     */
    public $data;

    /**
     * Cadastra as vagas no banco de dados
     *
     * @return boolean
     */
    public function cadastrar () {
        $this->data = date("Y-m-d H:i:s");

        $objDataBase = new Database("vagas");
        
        $this->vaga_id = $objDataBase->insert([
                                'titulo' => $this->titulo,
                                'descricao' => $this->descricao,
                                'status' => $this->status,
                                'data' => $this->data
                            ]);
        return true;
    }


    /**
     * Atualiza a vaga no banco
     *
     * @return boolean
     */
    public function atualizar () {
        return (new Database('vagas'))->update('vaga_id ='.$this->vaga_id, [
                                                'titulo' => $this->titulo,
                                                'descricao' => $this->descricao,
                                                'status' => $this->status,
                                                'data' => $this->data
                                            ]);
    }

    /**
     * Exclui vaga do banco
     *
     * @return boolean
     */
    public function excluir () {
        return (new Database('vagas'))->delete('vaga_id ='.$this->vaga_id);
    }

    /**
     * Obtém as vagas cadastradas no banco
     *
     * @param string $condition
     * @param string $order
     * @param string $limit
     * @return array instâncias das vagas || array void caso não encontre vagas
     */
    public static function getVagas ($condition = null, $order = null, $limit = null) {
        return (new Database('vagas'))->select($condition, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Busca de uma única vaga pelo ID
     *
     * @param integer $vaga_id
     * @return Vaga
     */
    public static function getVaga ($vaga_id) {
        return (new Database('vagas'))->select('vaga_id ='.$vaga_id)
                                        ->fetchObject(self::class);
    }
}
