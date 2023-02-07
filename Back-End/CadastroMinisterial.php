<?php

include 'Protetor.php';
include 'Conecta.php';

if (isset($_REQUEST['enviar'])) {

    $nm_min = mysqli_real_escape_string($conexao, trim($_REQUEST['nomemin']));
    $fone1  = mysqli_real_escape_string($conexao, trim($_REQUEST['fone1']));
    $fone2  = mysqli_real_escape_string($conexao, trim($_REQUEST['fone2']));                  
    $foneLi = $fone1 . $fone2;                  
    $senha  = mysqli_real_escape_string($conexao, trim($_REQUEST['senha']));
    $confSe = mysqli_real_escape_string($conexao, trim($_REQUEST['confsenha']));

    if($senha == $confSe){
        
        $cripto = password_hash($senha, PASSWORD_DEFAULT);
        $sql    = "SELECT * FROM tb_usuario WHERE telefone = '{$foneLi}'";
        $volta  = mysqli_query($conexao, $sql);
        $dados  = mysqli_fetch_assoc($volta);

        if (mysqli_num_rows($volta) > 0) {
            
            $sql   = "INSERT INTO tb_lider (id_user)
                      VALUES ('{$dados['id_user']}')";

            if (mysqli_query($conexao, $sql)) {

                $sql   = "SELECT * FROM tb_lider WHERE id_user = '{$dados['id_user']}'";
                $volta = mysqli_query($conexao, $sql);
                $dados = mysqli_fetch_assoc($volta);

                $sql   = "INSERT INTO tb_ministerios (nm_ministerio, pw_ministerio, id_lider)
                          VALUES ('{$nm_min}', '{$cripto}', '{$dados['id_lider']}')";
                $volta = mysqli_query($conexao, $sql);
                
                header('Location: ../Views/GruposMinisteriais.php');


            } else {  
                
                echo "<script>
                        alert('Erro no cadastro!');
                        window.location.href='../Views/CadastroMinisterial.php';
                     </script>";
                            
            }


        } else {

            echo "<script>
                    alert('Telefone Inexistente!');
                    window.location.href='../Views/CadastroMinisterial.php';
                  </script>";
            
        }
    
    } else {
        echo "<script>
                alert('Senhas diferentes!');
                window.location.href='../Views/CadastroMinisterial.php';
              </script>";
    }
}

?>