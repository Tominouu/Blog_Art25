<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
</head>
<?php
session_start();
$pseudo = isset($_SESSION['pseudoMemb']) ? $_SESSION['pseudoMemb'] : null;
$numStat = isset($_SESSION['numStat']) ? $_SESSION['numStat'] : 3;    

// Load config
require_once 'config.php';
?>
<body>

    <!-- Header avec Navbar -->
    <header class="haut mt-3 text-center p-2 position-fixed top-0 start-50 translate-middle-x shadow w-75 w-md-50" style="border-radius: 15px; height: 60px;">
        <nav class="navbar navbar-expand-md navbar-light h-100">
            <div class="container-fluid h-100 d-flex align-items-center">
                <!-- Logo -->
                <img src="/src/images/logoBlogArt.png" alt="logo" style="width: 70px; height: auto;">

                <!-- Bouton Burger pour les petits écrans -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Liens de navigation gauche -->
                <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
                    <div class="d-flex flex-grow-1 mx-5 justify-content-start text-start">
                        <ul class="navbar-nav gap-2">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a href="/views/frontend/events.php" class="nav-link">Evenement</a>
                            </li>
                            <li class="nav-item">
                                <a href="/views/frontend/actors.php" class="nav-link">Acteur</a>
                            </li>
                            <li class="nav-item">
                                <a href="/views/frontend/original.php" class="nav-link">Insolite</a>
                            </li>
                            
                            <!-- ✅ Bouton Admin visible uniquement si l'utilisateur est modérateur ou admin -->
                            <!-- <?php if ($numStat == '1' || $numStat == '2'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/views/backend/dashboard.php">Admin</a>
                            </li>
                            <?php endif; ?> -->
                        </ul>
                    </div>
                </div>

                <!-- Liens de navigation droite-->
                <!-- Zone de droite -->
                <div class="d-flex align-items-center">
                    <form class="d-flex me-2" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher sur le site…" aria-label="Search">
                    </form>

                    <!-- Si l'utilisateur est connecté -->
                    <?php if ($pseudo): ?>
                    <div class="d-flex align-items-center me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M13.468 12.37C12.444 11.226 10.834 10.5 8 10.5s-4.444.726-5.468 1.87A6.992 6.992 0 0 1 8 1a6.992 6.992 0 0 1 5.468 11.37z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        <span class="ms-2 fw-bold"><?php echo htmlspecialchars($pseudo); ?></span>
                    </div>
                    <a class="btn btn-danger m-1" href="/api/security/disconnect.php" role="button">Déconnexion</a>
                    <?php else: ?>
                        <a class="btn btn-primary m-1" href="/views/backend/security/login.php" role="button">Login</a>
                        <a class="btn btn-dark m-1" href="/views/backend/security/signup.php" role="button">Sign up</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Lien vers Bootstrap JS pour activer le menu burger -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
