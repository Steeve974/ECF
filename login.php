<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Gamesoft</title>
    <meta name="description" content="Gamesoft - Studio de développement de jeux vidéo français.">
    <meta name="keywords" content="Gamesoft, jeux vidéo, RPG, développement de jeux">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Open Graph Tags -->
    <meta property="og:title" content="Gamesoft - Studio de développement de jeux vidéo français">
    <meta property="og:description" content="Découvrez Gamesoft, un studio innovant dans le développement de jeux RPG.">
    <meta property="og:image" content="URL_to_your_image">
    <meta property="og:url" content="URL_to_your_website">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--deep-teal);" role="navigation">
        <a class="navbar-brand" href="#">
            <img src="LogoGameSoft.png" alt="Logo Gamesoft" style="width:80px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" id="index">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" id="login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="games.php" id="games">Jeux</a>
                </li>
                <li class="nav-item">
                    <!-- Lien conditionnel pour la soumission de jeu -->
                    <a class="nav-link" href="<?php echo isset($_SESSION['user_id']) ? 'submit-game.php' : 'login.php'; ?>" id="submit-game">Soumettre un jeu</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container mt-5">
        <h2>Connexion</h2>
        <?php
        session_start(); // Démarre la gestion de session

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php'; // Connexion à la base de données

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = $_POST['password'];

            // Utilisation de requêtes préparées
            $stmt = $conn->prepare("SELECT * FROM Utilisateurs WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['hashed_password'])) {
                    // Gestion de session réussie
                    $_SESSION['user_id'] = $user['id']; // Ou un autre identifiant unique
                    header('Location: page_securisee.php'); // Redirection vers une page sécurisée
                    exit;
                }
            }
            echo "Identifiants incorrects."; // Message d'erreur générique
            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
            <p><a href="password_reset.php">Mot de passe oublié ?</a></p>
        </form>
    </main>

    <footer class="footer mt-5">
        <p>&copy; 2023 Gamesoft. Tous droits réservés.</p>
    </footer>

    <!-- Scripts Externalisés -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
