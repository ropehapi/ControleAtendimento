<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ConexaoDAO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/ClienteVO.php';

class ClienteDAO extends Conexao
{
    public function InserirCliente(ClienteVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando = 'INSERT INTO db_projetoParalelo.tb_cliente
        (nome_cliente, email_cliente, endereco_cliente, telefone_cliente)
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

    public function ConsultarClientes()
    {
        $conexao = parent::retornaConexao();
        $comando = 'select * from tb_cliente';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlterarCliente($nome,$email,$endereco,$telefone,$id)
    {
        $conexao = parent::retornaConexao();
        $comando = 'update tb_cliente set nome_cliente = ?, email_cliente = ?, endereco_cliente = ?, telefone_cliente = ? where id_cliente = ?';
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
            echo $th->getMessage();
        }
        
    }

    public function ExcluirCliente($id){
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_cliente where id_cliente = ?';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1,$id);

        try {
            $sql->execute();
            return 1;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
