<div class="modal fade" id="modal-alterar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Informação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="cod_alt" id="cod_alt">

                <div class="form-group ">
                    <label>Cliente</label>
                    <select name="cliente_alt" id="cliente_alt" class="form-control">
                        <option id="comboCliente" value="">Selecione</option>
                        <?php for ($c = 0; $c < count($clientes); $c++) { ?>
                            <option value="<?= $clientes[$c]['id_cliente'] ?>"><?= $clientes[$c]['nome_cliente'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group ">
                    <label>Funcionário</label>
                    <select name="funcionario_alt" id="funcionario_alt" class="form-control">
                        <option id="comboFuncionario" value="">Selecione</option>
                        <?php for ($f = 0; $f < count($funcionarios); $f++) { ?>
                            <option value="<?= $funcionarios[$f]['id_funcionario'] ?>"><?= $funcionarios[$f]['nome_funcionario'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Data</label>
                    <input id="data_alt" name="data_alt" type="text" class="form-control" placeholder="Digite aqui">
                </div>

                <div class="form-group">
                    <label>Valor</label>
                    <input id="valor_alt" name="valor_alt" type="text" class="form-control" placeholder="Digite aqui">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea rows="5" id="descricao_alt" name="descricao_alt" type="text" class="form-control" placeholder="Digite aqui"></textarea>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterar" class="btn btn-primary">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>