<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/VO/FuncionarioVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/CONTROLLER/FuncionarioCTRL.php';

$vo = new FuncionarioVO;
$ctrl = new FuncionarioCTRL;

if (isset($_POST['btnCadastrar'])) {
    $vo->setNome($_POST['nome']);
    $vo->setEmail($_POST['email']);
    $vo->setEndereco($_POST['endereco']);
    $vo->setTelefone($_POST['telefone']);

    $ret = $ctrl->InserirFuncionario($vo);
} else if (isset($_POST['btnAlterar'])) {
    $ret = $ctrl->AlterarFuncionario($_POST['nome_alt'], $_POST['email_alt'], $_POST['endereco_alt'], $_POST['telefone_alt'], $_POST['cod_alt']);
}else if(isset($_POST['btnExcluir'])){
    $ret = $ctrl->ExcluirFuncionario($_POST['cod_item']);
}

$funcionarios = $ctrl->ConsultarFuncionarios();
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
                        <h3 class="card-title">Cadastrar funcionários</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="gerenciarFuncionarios.php">
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
                            <button name="btnCadastrar" onclick="ValidarTela(2)" class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Funcionários cadastrados</h3>
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
                                    <?php for ($i = 0; $i < count($funcionarios); $i++) { ?>
                                        <tr>
                                            <td><?= $funcionarios[$i]['id_funcionario'] ?></td>
                                            <td><?= $funcionarios[$i]['nome_funcionario'] ?></td>
                                            <td><?= $funcionarios[$i]['email_funcionario'] ?></td>
                                            <td><?= $funcionarios[$i]['endereco_funcionario'] ?></td>
                                            <td><?= $funcionarios[$i]['telefone_funcionario'] ?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-alterar" onclick="CarregarDadosAlterar('<?= $funcionarios[$i]['id_funcionario'] ?>','<?= $funcionarios[$i]['nome_funcionario'] ?>','<?= $funcionarios[$i]['email_funcionario'] ?>','<?= $funcionarios[$i]['endereco_funcionario'] ?>','<?= $funcionarios[$i]['telefone_funcionario'] ?>')">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-excluir" onclick="CarregarDadosExcluir('<?= $funcionarios[$i]['id_funcionario'] ?>','<?= $funcionarios[$i]['nome_funcionario'] ?>')">Excluir</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <form method="POST" action="gerenciarFuncionarios.php">
                                <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoParalelo/TEMPLATE/modais/_modal_alterar_funcionario.php'; ?>
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
</body>

</html>