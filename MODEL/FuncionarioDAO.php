<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ConexaoDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/FuncionarioVO.php';

class FuncionarioDAO extends Conexao
{
    public function InserirFuncionario(FuncionarioVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando = 'INSERT INTO db_projetoParalelo.tb_funcionario
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
            return -1;
        }
    }

    public function ConsultarFuncionarios()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select * from tb_funcionario';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlterarFuncionario($nome,$email,$endereco,$telefone,$id)
    {
        $conexao = parent::retornaConexao();
        $comando = 'update tb_funcionario set nome_funcionario = ?, email_funcionario = ?, endereco_funcionario = ?, telefone_funcionario = ? where id_funcionario = ?';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1,$nome);
        $sql->bindValue(2,$email);
        $sql->bindValue(3,$endereco);
        $sql->bindValue(4,$telefone);
        $sql->bindValue(5,$id);

        try {
            $sql->execute();
            return 1;
        } catch (\Throwable $th) {
            return -1;
        }
        
    }

    public function ExcluirFuncionario($id){
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_funcionario where id_funcionario = ?';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1,$id);

        try {
            $sql->execute();
            return 1;
        } catch (\Throwable $th) {
            return -1;
        }
    }
}
