<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db.php'; // Connexion à la base de données

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Vérifier si l'email existe dans la base de données
    $stmt = $conn->prepare("SELECT id FROM Utilisateurs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Générer un token unique
        $token = bin2hex(random_bytes(32));

        // Enregistrer le token dans la base de données ou une table spécifique pour les réinitialisations
        // ...

        // Envoyer un email avec le lien de réinitialisation
        $to = $email;
        $subject = "Réinitialisation de votre mot de passe";
        $message = "Veuillez cliquer sur ce lien pour réinitialiser votre mot de passe: \n";
        $message .= "http://votre_site.com/reset_password.php?token=" . $token;
        $headers = "From: no-reply@votre_site.com";

        mail($to, $subject, $message, $headers);

        echo "Un email de réinitialisation a été envoyé.";
    } else {
        echo "Adresse email non trouvée.";
    }

    $stmt->close();
    $conn->close();
}
?>
