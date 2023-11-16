<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ici, vous pouvez récupérer des données utilisateur ou d'autres informations sensibles

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ... vos autres balises meta et liens ... -->
    <title>Page Sécurisée</title>
</head>
<body>
    <!-- ... votre navigation ... -->

    <main class="container mt-5">
        <h2>Bienvenue sur votre espace sécurisé</h2>
        <!-- Contenu sécurisé ici -->
        <p>Cette page est accessible uniquement aux utilisateurs connectés.</p>
    </main>

    <!-- ... votre footer ... -->

    <!-- ... vos scripts JS ... -->
</body>
</html>
