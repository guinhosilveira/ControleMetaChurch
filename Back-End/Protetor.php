<?php

if (!isset($_SESSION)) {

    session_cache_expire(60);
    session_start();
    
}

if (!isset($_SESSION['nm_user'])) {

    echo "<script>
            alert ('Você não pode acessar essa página pois não está logado.');
            window.location.href = '../Views/Login.php';
          </script>";
    die();

}

?>