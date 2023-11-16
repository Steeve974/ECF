<?php
// Paramètres de connexion à la base de données
$servername = "localhost"; // ou l'adresse IP de votre serveur de base de données
$username = "votre_nom_utilisateur"; // votre nom d'utilisateur pour la base de données
$password = "votre_mot_de_passe"; // le mot de passe associé à cet utilisateur
$dbname = "votre_nom_db"; // le nom de votre base de données

// Création d'une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Si la connexion est établie, vous pouvez exécuter des requêtes ici
// ...

// N'oubliez pas de fermer la connexion après l'avoir utilisée
$conn->close();
?>
