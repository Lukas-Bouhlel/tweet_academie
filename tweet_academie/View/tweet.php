<?php
if (!isset($_SESSION['id'])) {
    header("Location: homeMain.php");
}
?>

<form method="POST" action="home.php">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12  w-100 bg-light border border-right-0 border-left-0 border-dark theme-change">

                <div class="form-group mt-3">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="tContainer" placeholder="Quoi de neuf ?"></textarea>
                </div>
                Me notifier des réponses
                <input type="checkbox" name="tNotif"/>

                <input type="submit" name="tSubmit" class="btn rounded-pill btn-outline-dark m-2 float-right" value="Tweeter" />

            </div>

                <?php foreach($viewTweet as $key => $value){ ?>
            <div class="col-md-12  w-100 bg-light border border-top-0 border-left-0 border-right-0 border-dark theme-change">
                <h4><?= $userinfo['avatar'] . $userinfo['fullname']?> <span><?='@'.$userinfo['username'] . $viewTweet[$key]['date_sent'];?> </span></h4>
                <p><?= $viewTweet[$key]['message'];?></p>

            </div>
                <?php } ?>
        </div>
    </div>


</form>
<span class="text-warning"><?php if (isset($erreur)) {
        echo $erreur;
    } ?></span>