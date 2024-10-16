<?php
// Initialisation des comptes utilisateurs
$users = [
    'carlos' => 'unknown', // Mot de passe inconnu pour Carlos
    'wiener' => 'peter',   // Mot de passe pour Wiener est 'peter'
];

// Gestion du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $users) && $users[$username] == $password) {
        // Connexion réussie, on redirige vers le panneau d'admin
        header("Location: /admin.php?user=" . urlencode($username));
        exit;
    } else {
        echo "<p style='color:red;'>Nom d'utilisateur ou mot de passe incorrect.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST" action="">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
