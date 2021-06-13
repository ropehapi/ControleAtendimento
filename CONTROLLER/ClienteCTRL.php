<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/ClienteVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ClienteDAO.php';


class ClienteCTRL{
    public function InserirCliente(ClienteVO $vo){
        if($vo->getNome()==''||$vo->getEmail()==''||$vo->getEndereco()==''||$vo->getTelefone()==''){
            return 0;
        }
        $dao = new ClienteDAO;
        return $dao->InserirCliente($vo);
    }

    public function ConsultarClientes()
    {
        $dao = new ClienteDAO;
        return $dao->ConsultarClientes();
    }

    public function AlterarCliente($nome, $email, $endereco, $telefone,$id)
    {
        if($nome==''||$email==''||$endereco==''||$telefone==''||$id==''){
            return 0;
        }
        $dao =  new ClienteDAO;
        return $dao->AlterarCliente($nome,$email,$endereco,$telefone,$id);
    }

    public function ExcluirCliente($id){
        $dao = new ClienteDAO;
        return $dao->ExcluirCliente($id);    
    }

}