<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=DM+Sans:wght@400;700&family=Dancing+Script&family=Dosis:wght@500;700&family=Epilogue:wght@800&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Montserrat:wght@600&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Palanquin:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&family=Staatliches&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/MC.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/Agenda.css">
    <script src="../JS/Agenda.js"></script>
    <script src='../fullcalendar/dist/index.global.js'></script>

    <title>Agenda</title>
</head>
<body>
    
    <nav>

        <a href="./Index.php">

            <img 
                src="../assets/MC.png" 
                alt="Logo da igreja"
            />

        </a>

        <ul>
            
            <li><a href="../Views/Home.php">Home</a></li>
            <li><a href="../Views/Agenda.php">Agenda</a></li>
            <li><a href="../Views/Membros.php">Membros</a></li>
            <li><a href="../Views/GruposMinisteriais.php">Ministérios</a></li>
            <li><a href="../Back-End/Logout.php">Logout</a></li>

        </ul>  

    </nav>
    
    <main>

        <div class="background hide"></div>

        <div class="title-wrapper">

            <h1>
    
                Calendário MetaChurch
    
            </h1>

        </div>

        <div class="calendar"></div>

        <div class="container hide">

            <div class="modal new hide">

                <button id="butCloseFirst">

                    <img
                        src="../assets/close.svg" 
                        alt="Flecha no canto superior direito do modal"
                    />

                </button>
    
                <form action="CadastroOcasion.php" method="POST">

                    <fieldset>

                        <div class="fieldset-wrapper">

                            <legend>
        
                            </legend>

                            <p>
                                Informe qual o próximo evento!
                            </p>
                            
                            <button type="submit" class="butCad">
                                Cadastro de evento
                            </button>

                        </div>

                    </fieldset>
        
        
                </form>
    
            </div>
            
            <div class="modal event hide">

                <button id="butCloseSecond">

                    <img
                        src="../assets/close.svg" 
                        alt="Flecha no canto superior direito do modal"
                    />

                </button>
    
                <span class="firstSpan"></span>
                <span class="secondSpan"></span>
                <span class="thirdSpan"></span>
                <span class="fourthSpan"></span>
    
            </div>

        </div>

    </main>

    <footer>

        <div class="infos">

            Contato presidencial: (51) 98414-0809 <br>
            Instagram: <a href="https://www.instagram.com/meta.church/">@metachurch</a>
            
        </div>

    </footer>

</body>
</html>
