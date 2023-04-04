<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download</title>
</head>
<body>
    
    <?php

        include './Conecta.php';
    
        
        if (isset($_POST['mem'])) {

            $table = '';
            $table .= '<table border="1">';
            $table .= '<tr>';
            $table .= '<td colspan="8"> Relatório </td>';
            $table .= '</tr>';

            $arquivo = 'membros.xls';
            $table .= '<tr>';
                $table .= '<thead>';
                    $table .= '<th> Nome </th>';
                    $table .= '<th> Email </th>';
                    $table .= '<th> Telefone </th>';
                    $table .= '<th> Data de Nascimento </th>';
                    $table .= '<th> Ano de Ingresso </th>';
                    $table .= '<th> Rua </th>';
                    $table .= '<th> Bairro </th>';
                    $table .= '<th> Cidade </th>';
                $table .= '</thead>';
            $table .= '</tr>';

            $sql   = "SELECT * FROM tb_membro";
            $volta = mysqli_query($conexao, $sql);

            while ($row_table = mysqli_fetch_assoc($volta)) {
                
                $table .= '<tbody>';
                    $table .= '<tr>';
                        $table .= '<td>'.$row_table['nm_membro'].'</td>';
                        $table .= '<td>'.$row_table['email'].'</td>';
                        $table .= '<td>'.$row_table['telefone'].'</td>';
                        $data   = date('d/m/Y H:i:s', strtotime($row_table["dt_nasc"]));
                        $table .= '<td>'.$data.'</td>';
                        $table .= '<td>'.substr($row_table['ingresso'], 0, 4).'</td>';
                        $table .= '<td>'.$row_table['rua'].'</td>';
                        $table .= '<td>'.$row_table['bairro'].'</td>';
                        $table .= '<td>'.$row_table['cidade'].'</td>';
                    $table .= '</tr>';
                $table .= '</tbody>';

            }

        } elseif (isset($_POST['min'])) {

            $table = '';
            $table .= '<table border="1">';
            $table .= '<tr>';
            $table .= '<td colspan="3"> Relatório </td>';
            $table .= '</tr>';

            $arquivo = 'ministérios.xls';
            $table .= '<tr>';
            $table .= '<thead>';
            $table .= '<th> Ministério </th>';
            $table .= '<th> Líder </th>';
            $table .= '<th> Telefone do líder </th>';
            $table .= '</thead>';
            $table .= '</tr>';
            
            $sql   = "SELECT * FROM tb_ministerios";
            $volta = mysqli_query($conexao, $sql);

            while ($row_table = mysqli_fetch_assoc($volta)) {

                $sql    = "SELECT * FROM tb_lider WHERE id_lider = '{$row_table['id_lider']}'"; 
                $volta2 = mysqli_query($conexao, $sql);
                $dados2 = mysqli_fetch_assoc($volta2);
                $sql    = "SELECT * FROM tb_usuario WHERE id_user = '{$dados2['id_user']}'"; 
                $volta3 = mysqli_query($conexao, $sql);
                $dados3 = mysqli_fetch_assoc($volta3);
                
                $table .= '<tbody>';
                    $table .= '<tr>';
                        $table .= '<td>'.$row_table['nm_ministerio'].'</td>';
                        $table .= '<td>'.$dados3['nm_user'].'</td>';
                        $table .= '<td>'.$dados3['telefone'].'</td>';
                    $table .= '</tr>';
                $table .= '</tbody>';

            }

        }

        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . "GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Fragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        header ("Content-Description: PHP Generated Date");
        echo $table;
        exit;

    ?>

</body>
</html>0