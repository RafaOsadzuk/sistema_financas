<?php

class Despesas
{
    private int $id;
    private float $valor;
    private DateTimeInterface $data;
    private string $descricao;
    private string $categoria;

    public function __construct(int $id, 
                                float $valor, 
                                 DateTimeInterface $data,
                                 string $descricao, 
                                 string $categoria)
    {
        $this->id = $id;
        $this->valor = $valor;
        $this->data = $data;
        $this->descricao = $descricao;
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

    public function getData(): DateTimeInterface
    {
        return $this->data;
    }


    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }
}