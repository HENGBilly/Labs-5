<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonData = file_get_contents('users.json');
    $users = json_decode($jsonData, true)['users'];

    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
            exit();
        }
    }
    $error = "Nom d'utilisateur ou mot de passe incorrect.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <label>Nom d'utilisateur:</label>
        <input type="text" name="username" required><br>
        <label>Mot de passe:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
