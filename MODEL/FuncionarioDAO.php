<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ConexaoDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/FuncionarioVO.php';

class FuncionarioDAO extends Conexao
{
    public function InserirFuncionario(FuncionarioVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando = 'INSERT INTO db_projetoParalelo.tb_funcionarios
        (nome_funcionario, email_funcionario, endereco_funcionario, telefone_funcionario)
        VALUES(?,?,?,?);';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getEmail());
        $sql->bindValue(3, $vo->getEndereco());
        $sql->bindValue(4, $vo->getTelefone());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function ConsultarFuncionarios()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select * from tb_funcionarios';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
}
