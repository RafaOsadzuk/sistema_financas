<?php

class Receita
{
    private string $id;
    private float $valor;
    private string $descricao;
    private string $data;
    private string $categoria;

    public function __construct(string $id,
                                float $valor,
                                string $descricao,
                                string $data,
                                string $categoria)
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->descricao = $descricao;
        $this->data = $data;
        $this->categoria = $categoria;
    }

    public function getId(): string
    {
        return $this->id;
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