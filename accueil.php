<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
    <h2>Bienvenue sur la page d'accueil, <?= htmlspecialchars($_SESSION['username']) ?>!</h2>
    <a href="index.php">Retour</a>
</body>
</html>
