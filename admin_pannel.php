<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('users.json');
    $data = json_decode($jsonData, true);

    // Filtrer les utilisateurs en excluant celui que l'admin veut supprimer
    $updatedUsers = array_filter($data['users'], function($user) {
        return $user['username'] !== $_POST['username'];
    });

    $data['users'] = array_values($updatedUsers); // Réindexer les tableaux
    file_put_contents('users.json', json_encode($data));
    $message = "Utilisateur supprimé avec succès.";
}

$jsonData = file_get_contents('users.json');
$users = json_decode($jsonData, true)['users'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Pannel</title>
</head>
<body>
    <h2>Admin Pannel</h2>
    <?php if (!empty($message)): ?>
        <p style="color:green;"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST" action="admin_pannel.php">
        <label for="username">Choisissez un utilisateur à supprimer :</label>
        <select name="username" required>
            <?php foreach ($users as $user): ?>
                <?php if ($user['role'] !== 'admin'): ?>
                    <option value="<?= $user['username'] ?>"><?= $user['username'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <button type="submit">Supprimer</button>
    </form>

    <a href="index.php">Retour</a>
</body>
</html>
