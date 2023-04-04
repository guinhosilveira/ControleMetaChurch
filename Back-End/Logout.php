<?php

include './Protetor.php';

session_destroy();
header("Location: ../Views/Login.php")

?>