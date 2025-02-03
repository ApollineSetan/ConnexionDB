<?php

/**
 * @param PDO $bdd
 * @param array $data (données du formulaire)
 * @return string (message de succès ou d'erreur)
 */


/*
- Cette fonction va vérifier que toutes les informations sont complètes. 
- Si tout est bon, l'email est vérifié pour être sûr qu'il est valide. 
- Ensuite on vérifie dans la BDD s'il n'y a pas déjà un utilisateur avec le même email.
- Ensuite, on ajoute ce nouvel utilisateur à la BDD.
- Si tout se passe bien, le compte est créé et un message de succès est renvoyé.
*/

function registerAccount(PDO $bdd, array $data): string {
    if (empty($data['firstname']) || empty($data['lastname']) || empty($data['email']) || empty($data['password'])) {
        return "Erreur : Tous les champs doivent être remplis.";
    }

    // Nettoyage des données
    $firstname = htmlspecialchars(trim($data['firstname']));
    $lastname = htmlspecialchars(trim($data['lastname']));
    $email = htmlspecialchars(trim($data['email']));
    $password = htmlspecialchars(trim($data['password']));

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return "Erreur : L'email fourni n'est pas valide.";
    }

    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{12,}$/", $data['password'])) {
        return "Erreur : Le mot de passe doit contenir au moins 12 caractères, avec une majuscule et un chiffre.";
    }

    $existingAccount = getAccountByEmail($bdd, $email);
    if ($existingAccount) {
        return "Erreur : Un compte existe déjà avec cet email.";
    }


    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $account = [
        $firstname,
        $lastname,
        $email,
        $hashedPassword
    ];

    try {
        addAccount($bdd, $account);
        return "Compte créé avec succès";
    } catch (Exception $e) {
        return "Erreur lors de la création du compte" . $e->getMessage();
    }
}

/**
 * @param PDO $bdd
 * @return array (liste des utilisateurs)
 */

/*
- Cette fonction sert à récupérer la liste de tous les utilisateurs de la BDD et à les afficher.
*/

 function listAccounts(PDO $bdd): array {
    try {
        return getAllAccount($bdd);
    } catch (Exception $e) {
        return ["Erreur" => "Impossible de récupérer les comptes :" . $e->getMessage()];
    }
 }