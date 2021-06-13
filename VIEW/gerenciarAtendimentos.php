<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/CONTROLLER/ClienteCTRL.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/CONTROLLER/FuncionarioCTRL.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/CONTROLLER/AtendimentoCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/AtendimentoVO.php';

$clienteCTRL = new ClienteCTRL;
$funcionarioCTRL = new FuncionarioCTRL;
$atendimentoCTRL = new AtendimentoCTRL;

$clientes = $clienteCTRL->ConsultarClientes();
$funcionarios = $funcionarioCTRL->ConsultarFuncionarios();
$atendimentos = $atendimentoCTRL->ConsultarAtendimentos();

if (isset($_POST['btnCadastrar'])) {
    $vo = new AtendimentoVO;
    $vo->setCliente($_POST['cliente']);
    $vo->setFuncionario($_POST['funcionario']);
    $vo->setData($_POST['data']);
    $vo->setValor($_POST['valor']);
    $vo->setDescricao($_POST['descricao']);

    $ret = $atendimentoCTRL->InserirAtendimento($vo);
}else if(isset($_POST['btnAlterar'])){
    $ret = $atendimentoCTRL->AlterarAtendimento($_POST['cod_alt'],$_POST['cliente_alt'],$_POST['funcionario_alt'],$_POST['data_alt'],$_POST['valor_alt'],$_POST['descricao_alt']);
}else if(isset($_POST['btnExcluir'])){
    $ret = $atendimentoCTRL->ExcluirAtendimento($_POST['cod_item']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_head.php' ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_topo.php' ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_menu.php' ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cadastrar atendimentos</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="gerenciarAtendimentos.php">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Cliente</label>
                                    <select name="cliente" id="cliente" class="form-control">
                                        <option>Selecione</option>
                                        <?php for ($c = 0; $c < count($clientes); $c++) { ?>
                                            <option value="<?= $clientes[$c]['id_cliente'] ?>"><?= $clientes[$c]['nome_cliente'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Funcionário</label>
                                    <select name="funcionario" id="funcionario" class="form-control">
                                        <option>Selecione</option>
                                        <?php for ($f = 0; $f < count($funcionarios); $f++) { ?>
                                            <option value="<?= $funcionarios[$f]['id_funcionario'] ?>"><?= $funcionarios[$f]['nome_funcionario'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Data</label>
                                    <div class="input-group date" data-target-input="nearest">
                                        <input name="data" id="data" type="text" placeholder="Ex: 28/03/2003" class="form-control datetimepicker-input" data-target="#reservationdate">
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label>Valor</label>
                                    <input name="valor" id="valor" type="text" class="form-control" placeholder="Ex: 500">
                                </div>
                            </div>

                            <div class="row">
                                <label>Descrição atendimento</label>
                                <textarea name="descricao" id="descricao" class="form-control" rows="5" placeholder="Digite aqui uma descrição para seu atendimento"></textarea>
                            </div>
                            <br>
                            <div align="right">
                                <button name="btnCadastrar" type="submit" onclick="ValidarTela(3)" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Atendimentos cadastrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Funcionario</th>
                                        <th>Data</th>
                                        <th>Valor</th>
                                        <th>Descrição</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($atendimentos); $i++) { ?>
                                        <tr>
                                            <td><?= $atendimentos[$i]['id_atendimento'] ?></td>
                                            <td><?= $atendimentos[$i]['nome_cliente'] ?></td>
                                            <td><?= $atendimentos[$i]['nome_funcionario'] ?></td>
                                            <td><?= $atendimentos[$i]['data_atendimento'] ?></td>
                                            <td><?= $atendimentos[$i]['valor_atendimento'] ?></td>
                                            <td><?= $atendimentos[$i]['desc_atendimento'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-alterar" onclick="CarregarDadosAlterarAtendimento('<?= $atendimentos[$i]['id_atendimento'] ?>','<?= $atendimentos[$i]['id_cliente'] ?>','<?= $atendimentos[$i]['id_funcionario'] ?>','<?= $atendimentos[$i]['nome_cliente']?>','<?= $atendimentos[$i]['nome_funcionario'] ?>','<?= $atendimentos[$i]['data_atendimento'] ?>','<?= $atendimentos[$i]['valor_atendimento'] ?>','<?= $atendimentos[$i]['desc_atendimento'] ?>')">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $atendimentos[$i]['id_atendimento'] ?>','<?= $atendimentos[$i]['desc_atendimento'] ?>')">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <form method="POST" action="gerenciarAtendimentos.php">
                                <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/modais/_modal_alterar_atendimento.php'; ?>
                                <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/modais/_modal_excluir.php'; 
                                ?>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_footer.php' ?>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_scripts.php' ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_msg.php' ?>
</body>

</html>