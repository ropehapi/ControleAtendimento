<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/FuncionarioVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/FuncionarioDAO.php';

class FuncionarioCTRL{
    public function InserirFuncionario(FuncionarioVO $vo){
        if($vo->getNome()==''||$vo->getEmail()==''||$vo->getEndereco()==''||$vo->getTelefone()==''){
            return 0;
        }
        $dao = new FuncionarioDAO;
        return $dao->InserirFuncionario($vo);
    }

    public function ConsultarFuncionarios()
    {
        $dao = new FuncionarioDAO;
        return $dao->ConsultarFuncionarios();
    }

    public function AlterarFuncionario($nome, $email, $endereco, $telefone,$id)
    {
        if($nome==''||$email==''||$endereco==''||$telefone==''||$id==''){
            return 0;
        }
        $dao =  new FuncionarioDAO;
        return $dao->AlterarFuncionario($nome,$email,$endereco,$telefone,$id);
    }

    public function ExcluirFuncionario($id){
        $dao = new FuncionarioDAO;
        return $dao->ExcluirFuncionario($id);    
    }

}