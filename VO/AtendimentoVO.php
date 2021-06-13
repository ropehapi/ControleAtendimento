<?php

class AtendimentoVO{
    private $cliente;
    private $funcionario;
    private $data;
    private $valor;
    private $descricao;

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }
    public function getCliente(){
        return $this->cliente;
    }

    public function setFuncionario($funcionario){
        $this->funcionario = $funcionario;
    }
    public function getFuncionario(){
        return $this->funcionario;
    }

    public function setData($data){
        $this->data = $data;
    }
    public function getData(){
        return $this->data;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }
    public function getValor(){
        return $this->valor;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getDescricao(){
        return $this->descricao;
    }
}