<?php
// Ce fichier est la vue où l'on affiche la page HTML pour la création d'un compte et la liste des utilisateurs.

?>

<style>
    section {
        padding-left: 60px;
    }

    th {
        padding-left: 80px;
        text-align: left;
    }

    td {
        padding-left: 80px;   
        text-align: left;
    }

    label {
        font-weight: bold;
    }

    input {
        margin-bottom: 10px;
    }

</style>

<!-- Affichage du formulaire de création de compte -->
<section>
    <h2>Créer un compte</h2>
    <form method="post" action="">
        <label for="firstname">Prénom : </label><br>
        <input type="text" id="firstname" name="firstname"><br>

        <label for="lastname">Nom : </label><br>
        <input type="text" id="lastname" name="lastname"><br>

        <label for="email">Email : </label><br>
        <input type="email" id="email" name="email"><br>

        <label for="password">Mot de passe : </label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" name="submit" value="Créer le compte">
    </form>

    <!-- Affichage du message (erreur ou succès) -->
    <p> <?= isset($message) ? htmlspecialchars($message) : ''; ?></p><br>
    
</section>

<?php
// Affichage de la liste des utilisateurs
?>
<section>
    <h2>Liste des utilisateurs</h2>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= htmlspecialchars($user['lastname']) ?></td>
                <td><?= htmlspecialchars($user['firstname']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
