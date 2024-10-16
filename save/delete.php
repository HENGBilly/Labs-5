<?php
// Vérifier si l'utilisateur est bien 'wiener' pour supprimer Carlos
if (isset($_GET['user']) && $_GET['user'] == 'carlos') {
    echo "<p>Carlos a été supprimé avec succès.</p>";
} else {
    echo "<p style='color:red;'>Action non autorisée.</p>";
}
?>
