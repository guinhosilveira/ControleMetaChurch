<?php

include '../Back-End/Protetor.php';
include '../Back-End/Conecta.php';

if (isset($_POST['btMin'])) {
    unset($_SESSION['ministerio']);
    $_SESSION['ministerio'] = $_POST['btMin'];
} 

$sql                     = "SELECT * FROM tb_ministerios WHERE id_ministerio = '{$_SESSION['ministerio']}'";
$volta                   = mysqli_query($conexao, $sql);
$infos_Ministerio        = mysqli_fetch_assoc($volta);

$sql                     = "SELECT * FROM tb_ocasion WHERE id_lider = '{$infos_Ministerio['id_lider']}'";
$volta2                  = mysqli_query($conexao, $sql);

if (mysqli_num_rows($volta2) == 1) {

    $relacaoMinisterioAgenda = mysqli_fetch_assoc($volta2);
    
    $sql                     = "SELECT * FROM tb_agenda WHERE id_agenda = '{$relacaoMinisterioAgenda['id_data']}'";
    $volta3                  = mysqli_query($conexao, $sql);
    $datasAgenda             = mysqli_fetch_assoc($volta3);

} elseif (mysqli_num_rows($volta2) > 1) {
    
    $relacaoMinisterioAgenda = mysqli_fetch_all($volta2, MYSQLI_ASSOC);
    $idData[] = array();
    $datas[]  = array(); 
    $index        = 0;

    foreach ($relacaoMinisterioAgenda as $key => $value) {
        $idData[$index] = $value['id_data'];
        $index++;
    }

    for ($i=0; $i < sizeof($idData); $i++) { 
        
        $sql         = "SELECT * FROM tb_agenda WHERE id_agenda = '{$idData[$i]}' ORDER BY id_agenda DESC LIMIT 3";
        $volta3      = mysqli_query($conexao, $sql);
        $datasAgenda = mysqli_fetch_assoc($volta3);
        $datas[$i]   = $datasAgenda;

    }    

}

$sql                     = "SELECT * FROM tb_lider WHERE id_lider = '{$infos_Ministerio['id_lider']}'";
$volta4                  = mysqli_query($conexao, $sql);
$lider                   = mysqli_fetch_assoc($volta4);

$sql                     = "SELECT * FROM tb_usuario WHERE id_user = '{$lider['id_user']}'";
$volta5                  = mysqli_query($conexao, $sql);
$infos_Lider             = mysqli_fetch_assoc($volta5);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=DM+Sans:wght@400;700&family=Dancing+Script&family=Dosis:wght@500;700&family=Epilogue:wght@800&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Montserrat:wght@600&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Palanquin:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&family=Staatliches&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/Ministerio.css">
    <link rel="shortcut icon" href="../assets/MC.png" type="image/x-icon">
    <script src="../JS/Ministerio.js" defer></script>

    <title>Ministério</title>
</head>
<body>

    <nav>

        <ul>
            
            <li><a href="../Views/Home.php">Home</a></li>
            <li><a href="../Views/Agenda.php">Agenda</a></li>
            <li><a href="../Views/Membros.php">Membros</a></li>
            <li><a href="../Views/GruposMinisteriais.php">Ministérios</a></li>
            <li><a href="../Back-End/Logout.php">Logout</a></li>

        </ul>  

    </nav>

    <main>

        <div class="validation-wrapper">

            <?php

                $isLeader = $_SESSION['id'] == $infos_Ministerio['id_lider'];

                if ($isLeader || (isset($_SESSION['accessMinisterio']) && $_SESSION['accessMinisterio'] == $infos_Ministerio['id_ministerio'])) {
                    
                    echo '<button class="butAct" onclick="alterVisibilityValidation();"></button>';
                
                }
            
            ?>

            <div class="modal">

                <h2>
    
                    Informe a senha para acessar o ministério <?= $infos_Ministerio['nm_ministerio'];?>
    
                </h2>    

                <form action="../Back-End/ValidaMinisterio.php" method="post">

                    <div class="input-wrapper">

                        <label for="event-password">
                            Senha:
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="event-password"
                        />

                    </div>

                    <button 
                        type="submit" 
                        name="btLog"
                        value="<?=$infos_Ministerio['id_ministerio'];?>">
                        Envie
                    </button>

                </form>

            </div>

        </div>

        <div class="modal-event-wrapper hide">
            
            <div class="modal">

                <button id="butClose">

                    <img
                        src="../assets/close.svg" 
                        alt="Flecha no canto superior direito do modal"
                    />

                </button>

                <h2></h2>

                <p></p>

                <a href="./Agenda.php"> 

                    <button>
                        Acesse todos os eventos!
                    </button>

                </a>

            </div>

        </div>

        <div class="title-wrapper hide">

            <h1>

                Ministério <?= $infos_Ministerio['nm_ministerio'];?>

            </h1>

        </div>

        <div class="post-wrapper hide">

            <?php 

                $sql      = "SELECT * FROM tb_posts_ministeriais where id_ministerio = '{$_SESSION['ministerio']}' ORDER BY id_post DESC limit 1";
                $volta6   = mysqli_query($conexao, $sql);
                $post     = mysqli_fetch_assoc($volta6);

                if (isset($post)) {

                    echo '<div class="post">'; 
                    
                        echo '<div class="side-A">';
                        
                            echo '<h2>'. $post['nm_post'] .'</h2>';
                            
                            echo '<p>'. $post['text_post'] .'</p>';
                            
                            if (isset($post['video'])) {
                                
                                echo "<iframe
                                        src='".$post['video']."' 
                                        title='YouTube video player' 
                                        frameborder='0' 
                                        allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
                                        allowfullscreen></iframe>";
                                        
                            }
                            
                            echo '<span> Postado em: '
                                                .substr($post['data_post'], 8, 10). '/' 
                                                .substr($post['data_post'], 5, 2). '/' 
                                                .substr($post['data_post'], 0, 4). 
                                 '</span>';
                        
                        echo '</div>';

                        $sql    = "SELECT * FROM tb_posts_ministeriais where id_ministerio = '{$_SESSION['ministerio']}'";
                        $volta7 = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($volta7) > 1) {

                            echo '<div class="side-B">';
    
                                echo '<a href="#"><button>Veja mais postagens</button></a>';
                            
                            echo '</div>';

                        }

                    echo '</div>';

                }

            ?>

        </div>

        <div class="events-wrapper hide">

            <?php

                if (mysqli_num_rows($volta2) > 0) {
                    
                    if (mysqli_num_rows($volta2) > 1) {

                        foreach ($datas as $key => $value) {
                            
                            echo '<div class="card'.$key.'">';

                                $type = $value['type_data'];
                                $img;

                                switch ($type) {
                                    case 1:
                                        $img = '../assets/public.jpg';
                                        break;
                                    
                                    case 2:
                                        $img = '../assets/rehearsal.jpg';
                                        break;
                                    
                                    case 3:
                                        $img = '../assets/meeting.jpg';
                                        break;
                                    
                                    case 4:
                                        $img = '../assets/class.jpg';
                                        break;
                                                                        
                                    default:
                                        break;
                                }

                                echo '<img src="'.$img.'" alt="Foto referente ao tipo de evento"/>';

                                echo '<h3>'. $value['nm_ocasion'] .'</h3>';
                        
                                echo '<div class="data">';

                                    echo '<p> Início: ' .substr($value['data_start'], 8, 2). '/' 
                                                        .substr($value['data_start'], 5, 2). '/' 
                                                        .substr($value['data_start'], 0, 4).  '</p>';
                            
                                    echo '<p> Fim: ' .substr($value['data_end'], 8, 2). '/' 
                                                     .substr($value['data_end'], 5, 2). '/' 
                                                     .substr($value['data_end'], 0, 4).  '</p>';

                                echo '</div>';
                            
                            echo '</div>';

                        }

                    } else {

                        echo '<div class="card">';

                            $type = $datasAgenda['type_data'];
                            $img;

                            switch ($type) {
                                case 1:
                                    $img = '../assets/public.jpg';
                                    break;
                                
                                case 2:
                                    $img = '../assets/rehearsal.jpg';
                                    break;
                                
                                case 3:
                                    $img = '../assets/meeting.jpg';
                                    break;
                                
                                case 4:
                                    $img = '../assets/class.jpg';
                                    break;
                                                                    
                                default:
                                    break;
                            }
                            
                            echo '<img src="'.$img.'" alt="Foto referente ao tipo de evento"/>';

                            echo '<h3>'. $datasAgenda['nm_ocasion'] .'</h3>';

                            echo '<div class="data">';

                                echo '<p> Início: ' .substr($datasAgenda['data_start'], 8, 2). '/' 
                                                    .substr($datasAgenda['data_start'], 5, 2). '/' 
                                                    .substr($datasAgenda['data_start'], 0, 4).  '</p>';
                        
                                echo '<p> Fim: ' .substr($datasAgenda['data_end'], 8, 2). '/' 
                                                .substr($datasAgenda['data_end'], 5, 2). '/' 
                                                .substr($datasAgenda['data_end'], 0, 4).  '</p>';

                            echo '</div>';
                    
                        echo '</div>';

                    }

                }
            
            ?>

        </div>

        <?php

        
            if ($isLeader) {
                        
                echo '<div class="button">';

                    echo '<a href="./NovoPostMinisterial.php"><button> Cadastrar Informações </button>';
                    echo '<a href="./CadastroOcasion.php"><button> Cadastrar Eventos </button>';

                echo '</div>';

            }
        
        ?>

    </main>

    <footer>

        <div class="infos">

            Contato presidencial: (51) 98414-0809 <br>
            Instagram: <a href="https://www.instagram.com/meta.church/">@metachurch</a>
            
        </div>

    </footer>

</body>
</html>