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
        <h2>Soumettre un jeu</h2>
        <?php
        session_start();

        // Assurez-vous que l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php'; // Connexion à la base de données

            // Validation et nettoyage des entrées
            $titre = mysqli_real_escape_string($conn, $_POST['gameTitle']);
            $description = mysqli_real_escape_string($conn, $_POST['gameDescription']);
            $moteur = mysqli_real_escape_string($conn, $_POST['gameEngine']);

            // Requêtes préparées pour l'insertion
            $stmt = $conn->prepare("INSERT INTO Jeux (titre, description, moteur) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $titre, $description, $moteur);

            if ($stmt->execute()) {
                echo "Jeu ajouté avec succès";
            } else {
                echo "Erreur lors de l'ajout du jeu : " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
        ?>
        <form action="submit-game.php" method="POST">
            <div class="form-group">
                <label for="gameTitle">Titre du jeu:</label>
                <input type="text" id="gameTitle" name="gameTitle" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gameDescription">Description:</label>
                <textarea id="gameDescription" name="gameDescription" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="gameEngine">Moteur du jeu:</label>
                <input type="text" id="gameEngine" name="gameEngine" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
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
 