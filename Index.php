<?php
// Démarrage de la session PHP
session_start();

// Génération d'un jeton CSRF
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Ajouter ici d'autres fonctions de sécurité ou de traitement des données
?>

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
        <section class="bg-image" style="background-image: url('Gamer.jpg'); padding: 20px; border-radius: 5px;">
        <h2>Descriptif de l’entreprise</h2>
            <p>Gamesoft est un studio de jeu vidéo français, développant des jeux vidéo. Ils proposent des 
                jeux vidéo principalement de type RPG (jeu vidéo de rôle) : ce type de jeu permet au héros de 
                pouvoir évoluer par l’intermédiaire de combat ou de résolution de quête. 
                
                Ces jeux vidéo sont à destination principalement des ordinateurs, mais parfois, ils font des 
                versions destinées à la console de jeu vidéo Xboite : ces versions ne sont pas automatiques, 
                elles sont effectuées en fonction des prévisions de vente. Si le jeu possède un score élevé (jeu 
                étant très attendu par les joueurs), alors Gamesoft effectue une version console.
                Il y a quelques mois, Gamesoft a mis en place un recrutement afin de répondre à un nouveau 
                projet interne : Développement d’une application Web permettant le suivi d’un jeu vidéo.
                
                Ce projet, résulte des avis des joueurs concernant la visibilité des développements. Gamesoft 
                est très sensible aux avis et il est important de pouvoir y répondre.
                Également, Gamesoft est très sensible à la démarche écologique, d’ailleurs dans chaque jeu 
                produit, il y a toujours une référence sur cette thématique : ils essayent de faire prendre 
                conscience aux joueurs, qu’il est important d’effectuer des gestes en ce sens.
                
                Étant à la fois adepte du jeu vidéo ainsi que du développement d’application Web, José, le 
                chef de projet technique de GameSoft, a décidé de vous recruter (sur recommandation de 
                Gregory Renuy) afin que vous puissiez participer pleinement au projet.
                Il attend que vous participiez à toutes les étapes du développement : vous devez intervenir 
                dans la planification du projet, dans la réalisation de l’application, dans la gestion de projet 
                ainsi que dans le déploiement </p>
        </section>

        <section class="mt-5">
            <img src="actu-octobre-2023-889x500.jpg" alt="L'actu du mois d'octobre chez Gamesoft" width="750" height="422">
            <h2>Dernières actualités</h2>
            <a href="https://www.jeuxvideo.com/toutes-les-news/">https://www.jeuxvideo.com/toutes-les-news/</a>
        </section>

        <section class="mt-5">
            <h2>Jeux en cours de développement</h2>
            <p>Jeux ici...</p>
        </section>
    </main>

    <footer class="footer mt-5">
        <p>&copy; 2023 Gamesoft. Tous droits réservés.</p>
    </footer>

    <!-- Scripts Externalisés -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
