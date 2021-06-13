<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/ClienteVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/CONTROLLER/ClienteCTRL.php';

$vo = new ClienteVO;
$ctrl = new ClienteCTRL;

if (isset($_POST['btnCadastrar'])) {
    $vo->setNome($_POST['nome']);
    $vo->setEmail($_POST['email']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setTelefone($_POST['telefone']);

    $ret = $ctrl->InserirCliente($vo);
} else if (isset($_POST['btnAlterar'])) {
    $ret = $ctrl->AlterarCliente($_POST['nome_alt'],$_POST['email_alt'],$_POST['endereco_alt'],$_POST['telefone_alt'],$_POST['cod_alt']);
}else if(isset($_POST['btnExcluir'])){
    $ret = $ctrl->ExcluirCliente($_POST['cod_item']);
}

$clientes = $ctrl->ConsultarClientes();
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
                        <h3 class="card-title">Cadastrar Clientes</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="gerenciarClientes.php">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome completo</label>
                                <input name="nome" id="nome" class="form-control" placeholder="Ex: Pedro Yoshimura">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input name="email" id="email" class="form-control" placeholder="Ex: ropehapi@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Endereco</label>
                                <input name="endereco" id="endereco" class="form-control" placeholder="Ex: Rua barão do rio branco 183">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Telefone</label>
                                <input name="telefone" id="telefone" class="form-control" placeholder="Ex: 43998222212">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer" align="right">
                            <button name="btnCadastrar" onclick="return ValidarTela(1)" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Clientes cadastrados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($clientes); $i++) { ?>
                                        <tr>
                                            <td><?= $clientes[$i]['id_cliente'] ?></td>
                                            <td><?= $clientes[$i]['nome_cliente'] ?></td>
                                            <td><?= $clientes[$i]['email_cliente'] ?></td>
                                            <td><?= $clientes[$i]['endereco_cliente'] ?></td>
                                            <td><?= $clientes[$i]['telefone_cliente'] ?></td>

                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-alterar" onclick="CarregarDadosAlterar('<?= $clientes[$i]['id_cliente'] ?>','<?= $clientes[$i]['nome_cliente'] ?>','<?= $clientes[$i]['email_cliente'] ?>','<?= $clientes[$i]['endereco_cliente'] ?>','<?= $clientes[$i]['telefone_cliente'] ?>')">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $clientes[$i]['id_cliente'] ?>','<?= $clientes[$i]['nome_cliente'] ?>')">Excluir</a>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <form method="POST" action="gerenciarClientes.php">
                                <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/modais/_modal_alterar_cliente.php'; ?>
                                <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/modais/_modal_excluir.php'; 
                                ?>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- Main content -->
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- ./wrapper -->

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_scripts.php' ?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/_msg.php' ?>
    </div>
</body>

</html>