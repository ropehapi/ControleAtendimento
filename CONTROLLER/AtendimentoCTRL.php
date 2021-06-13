<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/AtendimentoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/AtendimentoDAO.php';

class AtendimentoCTRL{
    public function InserirAtendimento(AtendimentoVO $vo)
    {
        $dao = new AtendimentoDAO;
        return $dao->InserirAtendimento($vo);
    }

    public function ConsultarAtendimentos(){
        $dao = new AtendimentoDAO;
        return $dao->ConsultarAtendimentos();
    }

    public function AlterarAtendimento($id,$idCliente,$idFuncionario,$data,$valor,$descricao){
        $dao = new AtendimentoDAO;
        return $dao->AlterarAtendimento($id,$idCliente,$idFuncionario,$data,$valor,$descricao);
    }

    public function ExcluirAtendimento($id){
        $dao = new AtendimentoDAO;
        return $dao->ExcluirAtendimento($id);
    }
}