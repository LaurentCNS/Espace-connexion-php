<?php
// session cookies
session_start();

// SI les cookies sont présents
if (!empty($_COOKIE['email']) && !empty($_COOKIE['password'])) {
    header('location:traitement.php'); // On envoi sur la page de traitement
// SI la session est déja validé
} else if (!empty($_SESSION['isConnected'])) {
    header('location:traitement.php'); // On envoi sur la page de traitement
// SINON on affiche la page    
} else {
    logStart();
}


// Porocedure de connexion
function logStart()
{
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Espace connexion</title>
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
            <div class="row">
                <form action="traitement.php" method="post">
                    <div class="mx-auto card p-5 mt-5 col-lg-6">
                        <h3 class="text-center mb-5">Mon compte</h3>
                        <div class="form-floating">
                            <input type="email" class="form-control mb-3" name="email" id="floatingInput" value="<?php if (!empty($_SESSION['email'])) {echo $_SESSION['email'];} ?>" placeholder="name@example.com">
                            <label for="floatingInput">Adresse mail</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="floatingPassword" value="<?php if (!empty($_SESSION['password'])){echo $_SESSION['password'];} ?>" placeholder="Password">
                            <label for="floatingPassword">Mot de passe</label>
                        </div>
                        <?php if(!empty($_GET['wrongUser'])){ echo '<p style="color:red">Email ou mot de passe incorrect</p>' ;} ?>
                        <button type="submit" class="btn btn-success mt-3" name="submit">Connexion</button>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="stayLogged" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Rester connecté
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="card mx-auto card mt-5" style="width: 18rem;">
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item">user1@test.fr - mdp1</li>
                        <li class="list-group-item">user2@test.fr - mdp2</li>
                        <li class="list-group-item">user3@test.fr - mdp3</li>
                        <li class="list-group-item">user4@test.fr - mdp4</li>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>