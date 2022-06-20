<?php
// session cookies
session_start();
// SI la seesion est validé 
if(!empty($_SESSION['login'])){
    header('location:traitement.php');
}else{
    echo logStart();
}

function logStart(){
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
                <div class="mx-auto card p-5 mt-5 col-lg-4">
                    <h3 class="text-center mb-5">Mon compte</h3>
                    <div class="form-floating">
                        <input type="email" class="form-control mb-3" name="email" id="floatingInput" value="<?php if (!empty($_GET['email'])) {
                                                                                                                    echo htmlentities($_GET['email'] ?? '');
                                                                                                                } ?>" placeholder="name@example.com">
                        <label for="floatingInput">Adresse mail</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" name="submit">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<?php
}
?>