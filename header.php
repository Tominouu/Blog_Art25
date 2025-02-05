<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog'Art</title>
    <!-- Load CSS -->
    <link rel="stylesheet" href="src/css/style.css" />
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/x-icon" href="src/images/article.png" />
    <link rel="stylesheet" href="/src/css/style.css" />

</head>
<?php
session_start();
$pseudo = isset($_SESSION['pseudoMemb']) ? $_SESSION['pseudoMemb'] : null;
$numStat = isset($_SESSION['numStat']) ? $_SESSION['numStat'] : 3;    

// Load config
require_once 'config.php';
?>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
  <img src="/src/images/logo.png" alt="logo" class="navbar-brand offset-1" style="width: 100px; height: auto;">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/views/frontend/actors.php">Acteurs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/views/frontend/events.php">Evenement</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/views/frontend/original.php">Insolite</a>
        </li>

        <!-- ✅ Bouton Admin visible uniquement si l'utilisateur est modérateur ou admin -->
        <?php if ($numStat == '1' || $numStat == '2'): ?>
          <li class="nav-item">
            <a class="nav-link" href="/views/backend/dashboard.php">Admin</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>

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
