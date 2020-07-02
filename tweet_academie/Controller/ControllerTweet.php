<?php
require_once "../Model/TweetsModel.php";
require_once "../Model/database.php";

class ControllerTweet
{
    private $tweetModel;

    public function __construct()
    {
        $this->tweetModel = new requeteTweet();
    }
    public function submit(){
        if(isset($_SESSION['id'])){
            if(isset($_POST['tSubmit'])) {
                if(isset($_POST['tContainer'])){

                    $container = htmlspecialchars($_POST['tContainer']);
                    
                    if(!empty($container)){
                        $containerlenght = strlen($container);
                        if($containerlenght <= 150){
                            if(isset($_POST['tNotif'])){
                                $notif_tweet = 1;
                            }else{
                                $notif_tweet = 0;
                            }
                            $this->tweetModel->tweet($container, $notif_tweet);
                        }else{
                            return "Votre tweet ne dois pas dépasser 150 caractères";
                        }
                    }
                }
            }
        }else{
            return "Veuillez vous connecter pour poster un tweet !";
        }
    }
    public function displayTweet(){
        if(isset($_SESSION['id'])){
                return $this->tweetModel->viewTweet();
        }
    }
    public function displayAllTweet(){
        if(isset($_SESSION['id'])){
                return $this->tweetModel->viewAllTweet();
        }
    }
}