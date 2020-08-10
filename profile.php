<?php

    session_start();
    include('bdd.php');
    
    if(isset($_SESSION['login'])){
?>

        <html>
            <head>
                
            </head>
            
            <body>
                <a href="IndexConnected.php">Retourner à l'accueil</a>
            </body>
            
        </html>


<?php




    }
    else
    {
        header('Location: index.php');
    }






?>