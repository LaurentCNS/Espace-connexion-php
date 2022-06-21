<?php
// session cookies
session_start();
// Déclaration de l'utilisateur à false
$validUser = false;


    // Tableau des utilisateurs contenant email et mot de passe // [0] mail // [1] mdp hashé // [2] photo utilisateur
    $users = [
        ['user1@test.fr',sha1('mdp1'),'Naruto','Uzumaki','https://yt3.ggpht.com/ytc/AKedOLQVyQcqzpVHG8IPHYQFCChi0XEUxfLKHLceq0EH=s900-c-k-c0x00ffffff-no-rj'],
        ['user2@test.fr',sha1('mdp2'),'John','Rambo','https://www.pngall.com/wp-content/uploads/6/Rambo-PNG.png'],
        ['user3@test.fr',sha1('mdp3'),'Ralph','La Casse','https://images8.alphacoders.com/360/thumb-1920-360874.jpg'],
        ['user4@test.fr',sha1('mdp4'),'Bart','Simpson','https://www.123-stickers.com/2104-thickbox/bart-simpsons-fesses.jpg'],
    ];


// SI les cookies sont déja présent    
if (!empty($_COOKIE['email']) && !empty($_COOKIE['password'])) {
    // Boucle sur le tableau utilisateurs
    foreach ($users as $item) { 
        if ($_COOKIE['email'] === $item[0] && $_COOKIE['password'] === $item[1]){
            // Appel de la procedure
            initUserConected($item , $validUser);
        }
    }
}

// SI la session est déja validé
else if(!empty($_SESSION['isConnected'])){
    header('location:mon_compte.php');  
    // SINON SI email password et submit sont envoyés
    }else if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])) {
    // Boucle sur le tableau utilisateurs
    foreach ($users as $item) { 
        // Si l'email et le mot de passe correspondent aux values des champs submit      
        if ($item[0] === $_POST['email'] && $item[1] === sha1($_POST['password'])) {
            // SI la case rester connecté est activée
            if(!empty($_POST['stayLogged'])){
                //Creation des cookies
                $email = htmlentities($_POST['email']);
                $password = sha1($_POST['password']);
                setcookie('email',$email,['expires' => time()+15778800, 'secure' => true, 'httponly' => true]); // exp 6 mois + secure
                setcookie('password', $password,['expires' => time()+15778800, 'secure' => true, 'httponly' => true]); // exp 6 mois + secure          
                }
            // Appel de la procedure
            initUserConected($item , $validUser);
        } 
    } 
    // SI l'utilisateur n'est pas un utilisateur enregistré
    if ($validUser === false){
        header('location:index.php?wrongUser=true');
    }


// SINON on empeche l'acces
} else {
    header('location:index.php');
}
 
// Procédure d'initialisation de l'utilisateur validé par la condition
function initUserConected($item , $validUser){
            $surnameUser = htmlentities($item[2]);
            $nameUser = htmlentities($item[3]);            
            $photoUser = $item[4];
            $validUser = true; // On indique que l'utilisateur est valide
            $_SESSION['isConnected'] = true; // On crée la session
            $_SESSION['surname'] = $surnameUser;
            $_SESSION['name'] = $nameUser;
            $_SESSION['photoUser'] = $photoUser;          
            header('location:mon_compte.php'); // On renvoi l'utilisateur vers la page du compte            
}