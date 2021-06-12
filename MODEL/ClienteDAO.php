<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ConexaoDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/ClienteVO.php';

class ClienteDAO extends Conexao{
    public function InserirCliente(ClienteVO $vo){
        $conexao = parent::retornaConexao();
        $comando = 'INSERT INTO db_projetoParalelo.tb_clientes
        (nome_cliente, email_cliente, endereco_cliente, telefone_cliente)
        VALUES(?,?,?,?);';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1,$vo->getNome());
        $sql->bindValue(2,$vo->getEmail());
        $sql->bindValue(3,$vo->getEndereco());
        $sql->bindValue(4,$vo->getTelefone());
        try{
            $sql->execute();
            return 1;
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function ConsultarClientes()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select * from tb_clientes';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
}