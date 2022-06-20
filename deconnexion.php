<?php
// session cookies
session_start();

// SI la session est validé  
if (!empty($_SESSION['isConnected'])) {
    // Si le choix de confirmation est validé
    if (!empty($_GET['deco'])){
        session_destroy();     // Destruction de la session
        header('location:index.php');   // Renvoi vers l'index
    } else {
        deconnexion();  // Affichage de la procédure de déconnexion
    }
// SINON renvoi sur la page de traitement    
} else {
    header('location:traitement.php');
}


// Procedure de deconnexion
function deconnexion()
{
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <style>
        body {
            background-color: black;
        }
    </style>

    <body>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-5" style="width: 18rem;">
                    <h3 class="card-header text-center">Deconnexion</h3>
                    <div class="card-body text-center">
                        <h5 class="card-title">Etes vous sur?</h5>
                        <a href="deconnexion.php?deco=true" class="btn btn-success me-2">OUI</a>
                        <a href="mon_compte.php" class="btn btn-danger ms-2">NON</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>