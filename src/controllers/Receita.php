<?php

class Receita
{
    private float $valor;
    private string $descricao;
    private string $data;
    private string $categoria;

    public function __construct(float $valor,
                                string $descricao,
                                string $data,
                                string $categoria)
    {
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->categoria;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }
}