<?php 
require_once 'header.php';
session_start(); 
sql_connect();

$pseudo = isset($_SESSION['pseudoMemb']) ? $_SESSION['pseudoMemb'] : null;
?>

<div class="container">
    <?php if ($pseudo): ?>
        <h2>Bienvenue, <?php echo htmlspecialchars($pseudo); ?> !</h2>
    <?php else: ?>
        <h1>Bienvenue sur notre Blog</h1>
        <p><a href="views/backend/security/login.php">Connectez-vous</a> pour accéder à votre espace.</p>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?> 
