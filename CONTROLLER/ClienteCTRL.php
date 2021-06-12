<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/ClienteVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/MODEL/ClienteDAO.php';


class ClienteCTRL{
    public function InserirCliente(ClienteVO $vo){
        $dao = new ClienteDAO;
        return $dao->InserirCliente($vo);
    }

    public function ConsultarClientes()
    {
        $dao = new ClienteDAO;
        return $dao->ConsultarClientes();
    }
}