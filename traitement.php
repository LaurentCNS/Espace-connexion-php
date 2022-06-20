<?php
// session cookies
session_start();
// Déclaration de l'utilisateur à false
$validUser = false;


    // Tableau des utilisateurs contenant email et mot de passe // [0] mail // [1] mdp hashé // [2] photo utilisateur
    $users = [
        ['user1@test.fr',sha1('mdp'),'https://yt3.ggpht.com/ytc/AKedOLQVyQcqzpVHG8IPHYQFCChi0XEUxfLKHLceq0EH=s900-c-k-c0x00ffffff-no-rj'],
        ['user2@test.fr',sha1('mdp2'),'https://www.pngall.com/wp-content/uploads/6/Rambo-PNG.png'],
        ['user3@test.fr',sha1('mdp3'),'http://assets.stickpng.com/images/5a722f4ef20f12107488b03a.png'],
    ];


// SI la session est déja validé
if(!empty($_SESSION['login'])){
    header('location:mon_compte.php');  
    // SINON SI email password et submit sont envoyés
    }else if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])) {
    // Boucle sur le tableau utilisateurs
    foreach ($users as $item) { 
        // Si l'email et le mot de passe correspondent aux values des champs submit      
        if ($item[0] === $_POST['email'] && $item[1] === sha1($_POST['password'])) {
            $photoUser = $item[2];
            $validUser = true; // On indique que l'utilisateur est valide
            $_SESSION['login'] = true; // On crée la session
            $_SESSION['photoUser'] = $photoUser;
            header('location:mon_compte.php'); // On renvoi l'utilisateur vers la page du compte
            break; // on stop la boucle
        } 
    } 
    // SI l'utilisateur n'est pas un utilisateur enregistré
    if ($validUser === false){
        echo 'Mauvais mot de passe';
        echo '<br><a href="index.php?email=' . htmlentities($_POST['email']) .  '" class="btn btn-primary">Retour à l\'espace connexion</a>';
    }

// SINON on empeche l'acces
} else {
    header('location:index.php');
}
 


