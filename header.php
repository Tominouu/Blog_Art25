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
    <!-- Header -->
    <header class="haut mt-3 text-center p-2 position-fixed top-0 start-50 translate-middle-x shadow w-100" style="border-radius: 15px; height: auto; max-width: 1200px;">
        <nav class="navbar navbar-expand-md navbar-white">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img src="/src/images/logoBlogArt.png" alt="logo" style="width: 70px; height: auto;">
                </a>

                <!-- Burger -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Navigation -->
                    <ul class="navbar-nav me-auto gap-2">
                        <li class="nav-item"><a class="nav-link active" href="/index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="/views/frontend/events.php">Événements</a></li>
                        <li class="nav-item"><a class="nav-link" href="/views/frontend/actors.php">Acteurs</a></li>
                        <li class="nav-item"><a class="nav-link" href="/views/frontend/original.php">Insolite</a></li>
                        <!-- Admin (si modérateur/admin) -->
                        <?php if ($numStat == '1' || $numStat == '2'): ?>
                            <li class="nav-item"><a class="nav-link" href="/views/backend/dashboard.php">Admin</a></li>
                        <?php endif; ?>
                    </ul>

                    <!-- Recherche -->
                    <form method="GET" action="/views/frontend/search.php" class="d-flex w-70 w-md-50 mb-2 mb-md-0">
                        <input class="form-control me-2" type="search" name="query" placeholder="Rechercher..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>

                    <!-- Connexion / profil -->
                    <div class="d-flex align-items-center ms-3">
                        <?php if ($pseudo): ?>
                            <div class="d-flex align-items-center me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M13.468 12.37C12.444 11.226 10.834 10.5 8 10.5s-4.444.726-5.468 1.87A6.992 6.992 0 0 1 8 1a6.992 6.992 0 0 1 5.468 11.37z"/>
                                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                                <span class="ms-2 fw-bold"><?php echo htmlspecialchars($pseudo); ?></span>
                            </div>
                            <a class="btn btn-danger" href="/api/security/disconnect.php">Déconnexion</a>
                        <?php else: ?>
                            <a class="btn btn-primary m-1" href="/views/backend/security/login.php">Login</a>
                            <a class="btn btn-dark m-1" href="/views/backend/security/signup.php">Sign up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
