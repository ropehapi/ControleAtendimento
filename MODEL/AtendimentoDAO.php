<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/AtendimentoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ConexaoDAO.php';

class AtendimentoDAO extends Conexao
{
    public function InserirAtendimento(AtendimentoVO $vo)
    {
        $conexao = parent::retornaConexao();
        $comando = 'INSERT INTO db_projetoparalelo.tb_atendimento
        (id_cliente, id_funcionario, data_atendimento, valor_atendimento, desc_atendimento)
        VALUES(?,?,?,?,?);
        ';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getCliente());
        $sql->bindValue(2, $vo->getFuncionario());
        $sql->bindValue(3, $vo->getData());
        $sql->bindValue(4, $vo->getValor());
        $sql->bindValue(5, $vo->getDescricao());

        try {
            $sql->execute();
            return 1;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function ConsultarAtendimentos(){
        $conexao = parent::retornaConexao();
        $comando = 'select at.id_atendimento,
                           cli.nome_cliente,
                           fun.nome_funcionario,
                           at.data_atendimento,
                           at.valor_atendimento,
                           at.desc_atendimento,
                           at.id_cliente,
                           at.id_funcionario
                      from tb_atendimento as at
                      inner join tb_cliente as cli
                      on at.id_cliente = cli.id_cliente
                      inner join tb_funcionario as fun
                      on at.id_funcionario = fun.id_funcionario ';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
    
        return $sql->fetchAll();
    }

    public function AlterarAtendimento($id,$idCliente,$idFuncionario,$data,$valor,$descricao){
        $conexao = parent::retornaConexao();
        $comando = 'update tb_atendimento set id_cliente = ?,id_funcionario =?,data_atendimento = ?,valor_atendimento = ?,desc_atendimento = ? where id_atendimento = ?';
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1,$idCliente);
        $sql->bindValue(2,$idFuncionario);
        $sql->bindValue(3,$data);
        $sql->bindValue(4,$valor);
        $sql->bindValue(5,$descricao);
        $sql->bindValue(6,$id);

        try {
            $sql->execute();
            return 1;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function ExcluirAtendimento($id){
        $conexao = parent::retornaConexao();
        $comando = 'delete from tb_atendimento where id_atendimento = ?';
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
