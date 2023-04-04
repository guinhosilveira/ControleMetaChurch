<?php 

include '../Back-End/Conecta.php';
include '../Back-End/Protetor.php';

$nome  = mysqli_real_escape_string($conexao, trim($_REQUEST['nome']));
$text  = mysqli_real_escape_string($conexao, trim($_REQUEST['text']));
$dirvd = mysqli_real_escape_string($conexao, trim($_REQUEST['video']));
$dir   = 'https://www.youtube.com/embed/' . $dirvd;
$now   = date("Y-m-d");

    $sql = "INSERT INTO tb_posts_ministeriais (nm_post, video, text_post, data_post, id_ministerio)
            VALUES ('{$nome}', '{$dir}', '{$text}', '{$now}', '{$_SESSION['ministerio']}')";
    mysqli_query($conexao, $sql);
    header("Location: ../Views/Ministerio.php");

?>