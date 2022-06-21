<?php
// session cookies
session_start();
// SI la session est validé 
if (!empty($_SESSION['isConnected'])) {
    comptePage(); // On lance la procedure
} else {
    header('location:traitement.php'); // On envoi sur la page de traintement
}

// Procedure html du compte utilisateur
function comptePage()
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
                <div class="card mt-5 text-center" style="width: 18rem;">
                    <img src="<?php echo $_SESSION['photoUser'] ?>" class="card-img-top" alt="login">
                    <div class="card-body">
                        <h5 class="card-title">Bonjour <?php echo $_SESSION['surname'] . ' ' . $_SESSION['name'] ?></h5>
                        <p class="card-text">Bienvenue dans votre espace privé de connexion</p>
                        <a href="deconnexion.php" class="btn btn-danger">Se déconnecter</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <div class="card text-center" style="width: 22rem;">
                <h5 class="card-header">INFOS SESSION ET COOKIES</h5>
                <div class="card-body">
                    <p class="card-text">La session restera active 3 heures par défault. Si les cookies sont activés avec l'option "resté connecté", elle sera valide 6 mois sauf si une déconnexion est effectué par l'utilsateur.</p>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>