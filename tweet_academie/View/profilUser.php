<?php
error_reporting(E_ALL);
require_once("../Controller/ControllerUser.php");
include_once("../Controller/ControllerTweet.php");
$connexion = new ControllerTweet();
$viewTweet = $connexion->displayTweet();
$userCo = new UserControl();
$userinfo = $userCo->GestionId();
if (!isset($_SESSION['id'])) {
    header("Location: inscription.php");
}
?>
<?php
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid shadow-sm">

    <!-- header -->
    <div class="row">

        <div class="col-md-12 bg-light p-3 border-bottom border-dark theme-change">
            <a href="home.php"><i class="fas svg-color fa-arrow-left"></i></a>
            <span class="font-weight-bold text-dark"><?php echo $userinfo['fullname']; ?></span>
        </div>

    </div>

    <!-- Banner -->
    <div class="row">
        <div class="col-md-12 bg-secondary">
            <div class="text-center m-5">
                Afficher la bannière et l'avatar ici !
                <span><?php echo $userinfo['avatar']; ?></span>
                <span><?php echo $userinfo['banner']; ?></span>
            </div>
        </div>
    </div>

    <!-- editor account -->
    <div class="row">
        <div class="col-md-12 bg-light theme-change">
            <button type="button" class="btn rounded-pill btn-outline-dark m-2 float-right"><a href="editionUser.php">Edit profile</button></a>
            <button type="button" class="btn rounded-pill btn-outline-dark m-2 float-right"><a href="home.php">Home</button></a>
        </div>
    </div>

    <!-- Info account -->
    <div class="row bg-light theme-change">
        <div class="col-md-2">
            <span class="font-weight-bold text-dark"><?php echo $userinfo['fullname']; ?></span>
            <div class="w-100"></div>
            <span class="font-italic font-weight-lighter text-dark"><?php echo '@'.$userinfo['username']; ?></span>
            <span class="text-dark"><?php echo $userinfo['biography']; ?></span>
        </div>

        <div class="w-100"></div>

        <div class="col-md-10">
            <span class="font-italic font-weight-lighter text-dark">
                <i class="fas fa-map-marked-alt mx-2"></i><?php echo $userinfo['ville']; ?> , <?php echo $userinfo['pays']; ?>
            </span>
            <span class="font-italic font-weight-lighter text-dark">
                <i class="fas fa-link mx-2"></i><?php echo $userinfo['site_web']; ?>
            </span>
            <span class="font-italic font-weight-lighter text-dark">
                <i class="fas fa-birthday-cake mx-2"></i><?php echo $userinfo['date_naissance']; ?>
            </span>
            <span class="font-italic font-weight-lighter text-dark">
                <i class="far fa-calendar-alt mx-2"></i><?php echo $userinfo['date_inscription']; ?>
            </span>
        </div>
    </div>

</div>

<form method="POST" action="profilUser.php">
    <table>
        <?php foreach($viewTweet as $key => $value){ ?>
            <tr>
                <td>
                    <h4><?= $userinfo['avatar'] . $userinfo['fullname']?><span><?='@'.$userinfo['username'] . $viewTweet[$key]['date_sent'];?></span></h4>
                    <p><?= $viewTweet[$key]['message'];?></p><br>
                </td>
            </tr>
        <?php } ?>
    </table>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

