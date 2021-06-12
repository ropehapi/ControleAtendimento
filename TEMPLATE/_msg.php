<?php
if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {
        case -2:
            echo "<script>
                      toastr.error('');
                  </script>";
            break;
        case -1:
            echo "<script>
                      toastr.error();
                  </script>";
            break;

        case 0:
            echo "<script>
                      toastr.warning();
                  </script>";
            break;

        case 1:
            echo "<script>
            toastr.success('Sua ação foi realizada com sucesso');
                  </script>";
            break;
        case 2:
            echo "<script>
                        toastr.success();
                 </script>";
            break;

        case 3:
            echo "<script>
                        toastr.warning();
                 </script>";
            break;

        case 4:
            echo "<script>
                        toastr.warning();
                 </script>";
            break;
    }
}
