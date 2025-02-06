<?php
session_start(); // Démarrer la session pour stocker les messages

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once '../../functions/ctrlSaisies.php';

$nomMemb = ctrlSaisies($_POST['nomMemb']);
$prenomMemb = ctrlSaisies($_POST['prenomMemb']);
$pseudoMemb = ctrlSaisies($_POST['pseudoMemb']);
$rgpdConsent = ctrlSaisies($_POST['rgpd']);

// Vérification de l'accord RGPD
    // Vérification de la case RGPD
    if (!isset($_POST['rgpd']) || $_POST['rgpd'] !== 'oui') {
        $_SESSION['error_message'] = "Vous devez accepter la conservation de vos données personnelles (RGPD) pour vous inscrire.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
    }

// Vérifier si le pseudo existe déjà en base de données
if (sql_select('membre', 'pseudoMemb', "pseudoMemb = '$pseudoMemb'")) {
    $_SESSION['error_message'] = "Ce pseudo est déjà utilisé. Veuillez en choisir un autre.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Vérifier qu'il y ai un prénom
if (empty($prenomMemb)) {
    $_SESSION['error_message'] = "Veuillez renseigner un prénom.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Vérifier qu'il y ai un nom
if (empty($nomMemb)) {
    $_SESSION['error_message'] = "Veuillez renseigner un nom.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Validation des deux mails
if ($_POST['eMailMemb'] != $_POST['eMailMemb2']) {
    $_SESSION['error_message'] = "Les deux adresses email ne correspondent pas.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Vérifier que l'email est valide
if (!filter_var($_POST['eMailMemb'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_message'] = "Adresse Email non valide";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Récupération du mot de passe avant validation
$passMemb = ctrlSaisies($_POST['passMemb']);

// Validation des deux mots de passe
if ($_POST['passMemb'] != $_POST['passMemb2']) {
    $_SESSION['error_message'] = "Les deux mots de passe ne correspondent pas.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Vérification de la longueur du mot de passe
if (strlen($passMemb) < 8 || strlen($passMemb) > 15) {
    $_SESSION['error_message'] = "Le mot de passe doit contenir entre 8 et 15 caractères.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Vérification avec une regex
$passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,15}$/";

if (!preg_match($passwordPattern, $passMemb)) {
    $_SESSION['error_message'] = "Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$eMailMemb = ctrlSaisies($_POST['eMailMemb']);
$numStat = ctrlSaisies($_POST['numStat']);

// Hashage du mot de passe
$hashedPassMemb = password_hash($passMemb, PASSWORD_DEFAULT);

// Insertion en base de données
sql_insert('membre', 'nomMemb, prenomMemb, pseudoMemb, passMemb, eMailMemb, numStat', 
    "'$nomMemb', '$prenomMemb', '$pseudoMemb', '$hashedPassMemb', '$eMailMemb', '$numStat'");

header('Location: ../../index.php');
exit;
