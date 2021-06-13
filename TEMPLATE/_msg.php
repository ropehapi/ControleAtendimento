<?php
if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {
        case -1:
            echo "<script>
            toastr.error('Ocorreu um erro durante a opração , tente novamente mais tarde');
                  </script>";
            break;
            case 0:
                echo "<script>
                toastr.warning('Por favor , preencha todos os campos');
                      </script>";
                break;
        case 1:
            echo "<script>
            toastr.success('Sua ação foi realizada com sucesso');
                  </script>";
            break;
    }
}
