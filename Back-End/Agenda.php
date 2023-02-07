<?php

include '../Back-End/Conecta.php';
include '../Back-End/Protetor.php';

$sql   = "SELECT * FROM tb_agenda";
$volta = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_all($volta, MYSQLI_ASSOC);

$array = [];

foreach ($dados as $key => $value) {

    $id_agenda = $value['id_agenda'];
    $nm_evento = $value['nm_ocasion'];
    $color     = $value['color'];
    $beggin    = $value['data_beggin'];
    $end       = $value['data_end'];
    
    $array[]   = ['id'    => $id_agenda,
                  'title' => $nm_evento,
                  'color' => $color,
                  'start' => $beggin,
                  'end'   => $end];

}

echo json_encode($array);

?>