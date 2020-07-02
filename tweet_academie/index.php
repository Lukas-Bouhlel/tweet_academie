<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: View/homeMain.php");
    //si tu n'est plus connecter tu na plus accès a cet page et tu est rediriger vers la page d'inscription.
}
if (isset($_SESSION['id'])) {
    header("Location: View/home.php");
}
?>