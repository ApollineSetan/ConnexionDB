<?php

/*
- Ce fichier gère la logique du contrôleur et inclut la vue.
- Lorsqu'un utilisateur soumet le formulaire, la fonction registerAccount est appelée.
- Après avoir ajouté le compte, un message s'affiche pour dire la création a réussi ou échoué.
- Ensuite, la fonction listAccounts() est appelée pour récupère la liste des comptes dans la BDD.
*/

include './vendor/autoload.php';
include './env.php';
include './utils/connexion.php';

include 'controller/accountController.php';
include 'model/account.php';


$bdd = connexion();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $message = registerAccount($bdd, $_POST);
} else {
    $message = "";
}

// Affichage de la liste des utilisateurs
$users = listAccounts($bdd);

include_once 'vue/header.php';
?>

<main>
    <?php include 'vue/account.php'; ?>
</main>

<?php
include_once 'vue/footer.php';
?>
