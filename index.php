<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
    <h2>Bienvenue, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>

    <?php if ($role === 'admin'): ?>
        <a href="accueil.php">Accueil</a><br>
        <a href="admin_pannel.php">Admin Pannel</a><br>
    <?php else: ?>
        <a href="accueil.php">Accueil</a><br>
    <?php endif; ?>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
