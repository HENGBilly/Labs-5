<?php
// Simuler l'authentification en fonction du paramètre 'user' dans l'URL
$user = isset($_GET['user']) ? $_GET['user'] : null;

if ($user === 'wiener' || $user === 'carlos') {
    echo "<h1>Panneau d'administration</h1>";
    echo "<p>Bienvenue, $user</p>";

    // Afficher l'option de suppression uniquement pour l'utilisateur 'wiener'
    if ($user === 'wiener') {
        echo "<p><a href='delete.php?user=carlos'>Supprimer Carlos</a></p>";
    }
} else {
    echo "<p style='color:red;'>Accès refusé. Veuillez vous connecter.</p>";
}
?>
