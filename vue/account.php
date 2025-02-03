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

    .message {
        font-size: 12px;
        padding: 10px;
        margin-top: 10px;
    }

    .error {
        color: red;
        border: 1px solid red;
        background-color: #f8d7da;
    }

    .success {
        color: green;
        border: 1px solid green;
        background-color: #d4edda;
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

    <!-- Affichage du message d'erreur ou de succès uniquement si un message existe -->
    <?php if (!empty($message)) : ?>
        <p class="message <?= strpos($message, 'Erreur') !== false ? 'error' : 'success'; ?>">
            <?= htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>

    
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
