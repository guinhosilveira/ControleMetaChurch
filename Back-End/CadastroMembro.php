<?php

include 'Conecta.php';

if (isset($_REQUEST['enviar'])) {
    
    $nome      = mysqli_real_escape_string($conexao, trim($_REQUEST['nome']));
    $fone1     = mysqli_real_escape_string($conexao, trim($_REQUEST['fone1']));
    $fone2     = mysqli_real_escape_string($conexao, trim($_REQUEST['fone2']));

    $telefone  = $fone1 . $fone2;

    $senha     = mysqli_real_escape_string($conexao, trim($_REQUEST['senha']));
    $confsenha = mysqli_real_escape_string($conexao, trim($_REQUEST['confsenha']));
    $nasci     = mysqli_real_escape_string($conexao, trim($_REQUEST['data']));
    $ingresso  = mysqli_real_escape_string($conexao, trim($_REQUEST['ano']));
    $email     = mysqli_real_escape_string($conexao, trim($_REQUEST['email']));
    $cidade    = mysqli_real_escape_string($conexao, trim($_REQUEST['cidade']));
    $bairro    = mysqli_real_escape_string($conexao, trim($_REQUEST['bairro']));
    $rua       = mysqli_real_escape_string($conexao, trim($_REQUEST['rua']));

    $ano       = $ingresso . '-01-01';
    
    $sql       = "SELECT * FROM tb_membro WHERE telefone = '{$telefone}'";
    $volta     = mysqli_query($conexao, $sql);
        

    if (mysqli_num_rows($volta) > 0) {

        echo "<script>
                alert('Telefone já cadastrado!');
                window.location.href = '../Views/CadastroMembro.php';
              </script>";

    } else {
        
        if ($senha == $confsenha) {

            $senhacrip = password_hash($senha, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO tb_membro (nm_membro, email, telefone, senha, dt_nasc, ingresso, cidade, bairro, rua)
                    VALUES ('{$nome}', '{$email}', '{$telefone}', '{$senhacrip}', '{$nasci}', '{$ano}', '{$cidade}', '{$bairro}', '{$rua}')";

            if (mysqli_query($conexao, $sql)) {
            
                echo "<script>
                        alert('Cadastro realizado!');
                        window.location.href = '../Views/Index.php';
                      </script>";
    
            } else {
                
                echo "<script>
                        alert('Erro ao realizar o cadastro!');
                        window.location.href = '../Views/CadastroMembro.php';
                      </script>";
    
            }
            
        } else {

            echo "<script>
                    alert('Cheque para que a senha seja confirmada igualmente!');
                    window.location.href = '../Views/CadastroMembro.php';
                  </script>";

        }
        
    }
    
}

?>