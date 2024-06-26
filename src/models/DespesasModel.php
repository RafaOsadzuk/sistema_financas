<?php

class DespesaModel
{
    private Despesas $despesas;

    public function __construct(Despesas $despesas)
    {
        $this->despesas = $despesas;
    }

    public function save()
    {        
        $stmt = Database::getConn()->prepare('INSERT INTO despesas (id, valor, 
                                                data, descricao, categoria) 
                                            VALUES (:id, :valor, :data, :descricao, :categoria);');
        
        $stmt->bindParam('id', $this->despesas->getId());
        $stmt->bindParam('valor', $this->despesas->getValor());
        $stmt->bindParam('data', $this->despesas->getData()->format('Y-m-d'));
        $stmt->bindParam('descricao', $this->despesas->getDescricao());
        $stmt->bindParam('categoria', $this->despesas->getCategoria());
        
        return $stmt->execute();
    }
}