<?php

include '../Back-End/Protetor.php';

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700&family=Dosis:wght@500;700&family=Inter:wght@400;700&family=JetBrains+Mono:wght@500;700&family=Mulish:wght@400;700&family=Open+Sans:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/CadastroMembro.css">
    <script src="../JS/CadastroMembro.js"></script>

    <title>Administração MetaChurch</title>
</head>
<body>
    
    <nav>

        <ul>

            <li>
                <a href="../Views/Agenda.php">
                    Agenda
                </a>
            </li>

            <li>
                <a 
                    href="../Views/Membros.php">
                    Membros
                </a>
            </li>

            <li>
                <a 
                    href="../Views/GruposMinisteriais.php"/>
                    Ministérios
                </a>
            </li>

        </ul>
            
    </nav>

    <main>
        
        <form action="../Back-End/CadastroMembro.php" method="POST">
            
            <fieldset class="lado1">

                <div class="fieldset-wrapper">

                    <div class="legend-wrapper">

                        <legend>
    
                            Informações Obrigatórias
    
                        </legend>

                    </div>

                    <div class="input-wrapper">

                        <label 
                            for="nome">
                            Nome:
                        </label>
                        <input 
                            type="text" 
                            name="nome" 
                            id="nome" 
                            required
                        />

                    </div>

                    <div class="input-wrapper">

                        <label 
                            for="fone">
                            Telefone: <span>Primeiro o DDD depois o número</span>
                        </label>
                        <div class="fones">
                            <input 
                                type="tel" 
                                name="fone1" 
                                id="fone1" 
                                maxlength="2"
                                required
                            />
                            <input  
                                type="tel" 
                                name="fone2" 
                                id="fone2" 
                                maxlength="9" 
                                required 
                            />
                        </div>

                    </div>

                    <div class="input-wrapper">

                        <label 
                            for="senha">
                            Senha:
                        </label>
                        <input 
                            type="password" 
                            name="senha" 
                            id="senha" 
                            required
                        />

                    </div>

                    <div class="input-wrapper">

                        <label 
                            for="confsenha">
                            Confirmar senha:
                        </label>
                        <input 
                            type="password" 
                            name="confsenha" 
                            id="confsenha" 
                            required
                        />

                    </div>

                    <div class="buttons">
                        <button type="button" onclick="Mudarestado()" class="enviar">Enviar</button>
                        <a href="Index.php"><button type="button">Cancelar</button></a>
                    </div>

                </div>

            </fieldset>

            <fieldset class="lado2" hidden>
            
                <div class="legend-wrapper">

                    <legend>
        
                        Informações Opcionais
        
                    </legend>
                    
                </div>

                <div class="fieldset-wrapper">
                    
                    <div class="input-wrapper">
    
                        <label 
                            for="data">
                            Data de Nascimento:
                        </label>
                        <input 
                            type="date" 
                            name="data" 
                            id="data"
                        />
    
                    </div>
    
                    <div class="input-wrapper">
    
                        <label 
                            for="ano">
                            Ano de Ingresso: <span>Informe o ano de ingresso na igreja</span>
                        </label>
                        <input 
                            type="tel" 
                            name="ano" 
                            id="ano" 
                            maxlength="4"
                        />
    
                    </div>
    
                    <div class="input-wrapper">
                    
                        <label 
                            for="email">
                            Email:
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                        />
    
                    </div>
    
                    <div class="input-wrapper">
    
                        <label for="cidade">
                            Cidade:
                        </label>
                        <input 
                            type="text" 
                            name="cidade" 
                            id="cidade" 
                        />
    
                    </div>
    
                    <div class="input-wrapper">
    
                        <label 
                            for="bairro">
                            Bairro:
                        </label>
                        <input 
                            type="text" 
                            name="bairro" 
                            id="bairro" 
                        />
    
                    </div>
    
                    <div class="input-wrapper">
    
                        <label 
                            for="rua">
                            Rua e número: <span>(Botafogo, 531)</span>
                        </label>
                        <input 
                            type="text" 
                            name="rua" 
                            id="rua" 
                        />
    
                    </div>
    
                </div>  

                <div class="buttons">
                    <button type="submit" class="enviar" name="enviar">Enviar</button>
                    <a href="Index.php"><button type="button">Cancelar</button></a>
                </div>
                
            </fieldset>    

        </form> 

    </main>

</body>
</html>