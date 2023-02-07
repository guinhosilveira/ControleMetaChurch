<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/Agenda.css">
    <script src="../JS/Agenda.js"></script>
    <script src='../fullcalendar/dist/index.global.js'></script>

    <title>Agenda</title>
</head>
<body>
    
    <header>

        <a href="../Views/Agenda.php">Agenda</a>
        <a href="../Views/Membros.php">Membros</a>
        <a href="../Views/GruposMinisteriais.php">Ministérios</a>

    </header>

    <main>

        <div id="calendar"></div>

        <form action="CadastroOcasion.php" method="POST">

            <button type="submit" class="butCad">
                Cadastro de evento
            </button>

        </form>

    </main>

    <footer>



    </footer>

</body>
</html>
