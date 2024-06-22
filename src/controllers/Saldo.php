<?php 

class Saldo
{
    private float $saldo;
    public function __construct(float $saldo)
    {
    $this->saldo = $saldo;
    }

    public function getSaldo(): float{
        return $this->saldo;
    }
}
