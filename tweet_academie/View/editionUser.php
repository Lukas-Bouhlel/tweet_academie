<?php
error_reporting(E_ALL);
require_once("../Controller/ControllerUser.php");
$connexion = new UserControl();
$user = $connexion->data_member();
$connexion->Edition();
if (!isset($_SESSION['id'])) {
    header("Location: home2.php");
}
?>
<head>
<link rel="stylesheet" href="../Assets/CSS/inscriptionUser.css">
</head>
<div class="box">
    <div class="text-center">
        <div class="connexion">
            <h3>EDITION DE MON PROFIL</h3>
            <br>
            <form method="POST" action="editionUser.php">
                <div>
                <label>Nom :</label>
                    <input type="text" name="newNom" placeholder="Fullname" value="<?php echo $user['fullname']; ?>" />
                </div>
                <div>
                <label>Nom d'utilisateur :</label>
                    <input type="text" name="newUsername" placeholder="Username" value="<?php echo $user['username']; ?>" />
                </div>
                <div>
                <label>Bio :</label>
                    <textarea name="newBio"><?php echo $user['biography'];?></textarea>
                </div>
                <div>
                <label>Localisation /</label>
                <label>Ville :</label>
                    <input type="text" name="newVille" placeholder="Ville" value="<?php echo $user['ville']; ?>" />
                <label>Pays :</label>
                    <input type="text" name="newPays" placeholder="Pays" value="<?php echo $user['pays']; ?>" />
                </div>
                <div>
                <label>Email :</label>
                    <input type="text" name="newMail" placeholder="Mail" value="<?php echo $user['mail']; ?>" />
                </div>
                <div>
                <label>Site Web :</label>
                    <input type="text" name="newUrl" placeholder="site web" value="<?php echo $user['site_web']; ?>" />
                </div>
                <label>Tel :</label>
                    <input type="text" name="newTel" placeholder="tel" value="<?php echo $user['tel']; ?>" />
                </div>
                <div>
                    <label for="date_naissance">Date de naissance :</label>
                    <input type="date" name="date_naissance" id="date_naissance" value="<?php echo $user['date_naissance']; ?>" />
                </div>
                <div>
                <label>Mot de passe :</label>
                    <input type="password" name="newMdp" placeholder="Nouveau mot de passe" />
                </div>
                <div>
                <label>Confirmation du mot de passe :</label>        
                    <input type="password" name="newMdp2" placeholder="Confirmation du mot de passe" />
                </div>
                    <input type="submit" value="Mettre à jour mon profil !" class="btn2" />
                    <!-- <input type="submit" value="supprimer" name="supr" /> -->
            </form>
            <span id="alerte"><?php if (null !== $connexion->Edition()) {
                                    echo $connexion->Edition();
                                } ?></span>
        </div>
    </div>
</div>