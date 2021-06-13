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

                <div class="form-group">
                    <label>Nome do funcionario</label>
                    <input id="nome_alt" name="nome_alt" type="text" class="form-control" placeholder="Digite aqui">
                </div>

                <div class="form-group">
                    <label>Email do funcionario</label>
                    <input id="email_alt" name="email_alt" type="text" class="form-control" placeholder="Digite aqui">
                </div>

                <div class="form-group">
                    <label>Endereço do funcionario</label>
                    <input id="endereco_alt" name="endereco_alt" type="text" class="form-control" placeholder="Digite aqui">
                </div>

                <div class="form-group">
                    <label>Telefone do funcionario</label>
                    <input id="telefone_alt" name="telefone_alt" type="text" class="form-control" placeholder="Digite aqui">
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button name="btnAlterar" class="btn btn-primary" onclick="ValidarTela(5)">Alterar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>