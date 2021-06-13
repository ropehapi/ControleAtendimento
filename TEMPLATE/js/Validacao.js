function ValidarTela(tela) {

    var ret = true;

    switch (tela) {
        case 1:
            if ($("#nome").val().trim() == '' || $("#email").val().trim() == '' || $("#endereco").val().trim() == '' || $("#telefone").val().trim() == '') {
                toastr.warning('Por favor , preencha todos os campos');
                ret = false;
            }
            break;
        case 2:
            if ($("#nome").val().trim() == '' || $("#email").val().trim() == '' || $("#endereco").val().trim() == '' || $("#telefone").val().trim() == '') {
                toastr.warning('Por favor , preencha todos os campos');
                ret = false;
            }
            break;
        case 3:
            if ($("#cliente").val().trim() == '' || $("#funcionario").val().trim() == '' || $("#data").val().trim() == '' || $("#valor").val().trim() == '' || $("#descricao").val().trim() == '') {
                toastr.warning('Por favor , preencha todos os campos');
                ret = false;
            }
            break;

        case 4:
            if ($("#nome_alt").val().trim() == '' || $("#email_alt").val().trim() == '' || $("#endereco_alt").val().trim() == '' || $("#telefone_alt").val().trim() == '') {
                toastr.warning('Por favor , preencha todos os campos');
                ret = false;
            }
            break;
        case 5:
            if ($("#nome_alt").val().trim() == '' || $("#email_alt").val().trim() == '' || $("#endereco_alt").val().trim() == '' || $("#telefone_alt").val().trim() == '') {
                toastr.warning('Por favor , preencha todos os campos');
                ret = false;
            }
            break;
        case 6:
            if ($("#cliente_alt").val().trim() == '' || $("#funcionario_alt").val().trim() == '' || $("#data_alt").val().trim() == '' || $("#valor_alt").val().trim() == '' || $("#descricao_alt").val().trim() == '') {
                toastr.warning('Por favor , preencha todos os campos');
                ret = false;
            }
            break;
    }
}