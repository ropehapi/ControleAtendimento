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
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Cliente</label>
                                <select class="form-control">
                                    <option>option 1</option>

                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label>Funcionário</label>
                                <select class="form-control">
                                    <option>option 1</option>

                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-6">
                                <label>Data</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" placeholder="Ex: 28/03/2003" class="form-control datetimepicker-input" data-target="#reservationdate">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Valor</label>
                                <input type="text" class="form-control" placeholder="Ex: 500">
                            </div>
                        </div>

                        <div class="row">
                            <label>Descrição atendimento</label>
                            <textarea class="form-control" rows="5" placeholder="Digite aqui uma descrição para seu atendimento"></textarea>
                        </div>
                        <br>
                        <div align="right">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
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
                                    <tr>
                                        <td>ID</td>
                                        <td>Nome</td>
                                        <td>Email</td>
                                        <td>Endereço</td>
                                        <td>Telefone</td>
                                        <td>
                                            <a class="btn btn-warning btn-xs">Alterar</a>
                                            <a class="btn btn-danger btn-xs">Excluir</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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