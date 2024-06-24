<?php

class ReceitaModel
{
    private Receitas $receitas;

    public function __construct(Receitas $receitas)
    {
        $this->receitas = $receitas;
    }

    public function save()
    {        
        $stmt = Database::getConn()->prepare('INSERT INTO receitas (id, valor, 
                                                data, descricao, categoria) 
                                            VALUES (:id, :valor, :data, :descricao, :categoria);');
        
        $stmt->bindParam('id', $this->receitas->getId());
        $stmt->bindParam('valor', $this->receitas->getValor());
        $stmt->bindParam('data', $this->receitas->getData()->format('Y-m-d'));
        $stmt->bindParam('descricao', $this->receitas->getDescricao());
        $stmt->bindParam('categoria', $this->receitas->getCategoria());
        
        return $stmt->execute();
    }


    public static function getUltimoUsuario()
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM usuarios ORDER BY id DESC;');
        $stmt->execute();
        return $stmt->fetch();
    }
}