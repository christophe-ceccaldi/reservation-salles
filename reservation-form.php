<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="inscription.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    </head>
    <header>
        <!--links to be redirected in my nav-->
        <nav>
            <ul>
                <li><a href="http://localhost/reservation-salles/index.php">Accueil</a></li>
                <li><a href="http://localhost/reservation-salles/connexion.php">Connexion</a></li>
                <li><a href="https://christophe-ceccaldi.students-laplateforme.io/livre-or/livreor.php">Planning</a></li>
            </ul >
            
        </nav>
    </header>
    <body class ="mama01">
    <main>
        <div class= "displaymod">

            <div>

                <h2>Réservation de salles</h2>
                <!--champs à remplir dans le formulaire pour inscription user avec post pour récupérer les infos-->
                <form method="post">
                    <!--use of label to display the values of keys input (field to fill)-->
                    <label>
                        <span>Login</span>
                        <input type="text" id="login" name='login'/>
                    </label>
                    
                    <label>
                        <span>Password</span>
                        <input type="password" id="password" name='password' minlength="3" required/>
                    </label>

                    <label>
                        <span>Comfirmpassword</span>
                        <input type="password" id="comfirm_password" name='comfirm_password' minlength="3" required/>
                    </label>
                        <input type="submit" id="button" name='submit'/>
                </form>
            </div>
        </div>        
        </main>
            <footer>
                    <!--include footer in my page-->
                <?php
                require "footer.php";
                ?>
            </footer>   
    </body>
</html>