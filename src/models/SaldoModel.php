<?php

class SaldoModel{
    private Saldo $saldo;

    public function __construct(Saldo $saldo)
    {
        $this->saldo = $saldo;
    }

    public function save()
    {
        $stmt = Database::getConn()->prepare('INSERT INTO saldo (saldo) VALUES (:saldo);');
        
        $stmt->bindParam('saldo', $this->saldo->getSaldo());

        return $stmt->execute();
   
    }
}