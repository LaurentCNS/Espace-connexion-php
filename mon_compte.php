<?php
// session cookies
session_start();
// SI la seesion est validé 
if(!empty($_SESSION['login'])){
    comptePage();
}else{
    header('location:veryf.php');
}

function comptePage(){
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
                        <h5 class="card-title">Bonjour</h5>
                        <p class="card-text">Bienvenue dans votre espace privé de connexion</p>
                        <a href="index.php" class="btn btn-primary">Se déconnecter</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>