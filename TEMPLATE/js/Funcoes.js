function CarregarDadosExcluir(id, nome) {
    $("#cod_item").val(id);
    $("#nome_excluir").html(nome);
}


function CarregarDadosAlterar(id, nome, email, endereco, telefone) {
    $("#cod_alt").val(id);
    $("#nome_alt").val(nome);
    $("#email_alt").val(email);
    $("#endereco_alt").val(endereco);
    $("#telefone_alt").val(telefone);
}

function CarregarDadosAlterarAtendimento(id,idCliente,idFuncionario,cliente,funcionario,data,valor,descricao) {
    $("#cod_alt").val(id)
    $("#data_alt").val(data);
    $("#valor_alt").val(valor);
    $("#descricao_alt").val(descricao);

    $("#comboCliente").val(idCliente)
    $("#comboCliente").html(cliente+'(Atual)')

    $("#comboFuncionario").val(idFuncionario)
    $("#comboFuncionario").html(funcionario+'(Atual)')
}
