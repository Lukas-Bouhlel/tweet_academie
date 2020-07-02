<?php

require_once "database.php";
class requeteTweet extends Database
{
    public function tweet($container, $notif_tweet){
        $insertTweet = $this->pdo->prepare("INSERT INTO tweets (id_user,message, date_sent, fav_counter, rt_counter,comm_counter) VALUES (:id_user,:message,NOW(), 1, 1,:comm_counter)");
        $insertTweet->bindParam(':id_user',$_SESSION['id'],PDO::PARAM_INT);
        $insertTweet->bindParam(':message',$container, PDO::PARAM_STR);
        $insertTweet->bindParam(':comm_counter',$notif_tweet);
        $insertTweet->execute();
    }
    
    public function viewTweet(){
        $getid = intval($_SESSION['id']);
        $viewAllTweet = $this->pdo->prepare("SELECT * FROM tweets WHERE id_user = :id_user ORDER BY id_tweet DESC");
        $viewAllTweet->bindParam('id_user',$getid,PDO::PARAM_INT);
        $viewAllTweet->execute();
        return $viewAllTweet->fetchAll();
    }
    public function viewAllTweet(){
        $viewAllTweet = $this->pdo->prepare("SELECT * FROM tweets ORDER BY id_tweet DESC");
        $viewAllTweet->execute();
        return $viewAllTweet->fetchAll();
    }
    // public function viewTweetFollow(){
    //     $getid = intval($_SESSION['id']);
    //     $viewAllTweet = $this->pdo->prepare("SELECT * FROM tweets INNER JOIN follow ON tweets.id_user = follow.id_follower WHERE id_follower = :id_user ORDER BY id_tweet DESC");
    //     $viewAllTweet->bindParam(':id_user',$getid,PDO::PARAM_INT);
    //     $viewAllTweet->execute();
    //     return $viewAllTweet->fetchAll();
    // }
    // public function followTweet(){
    //     $getid = intval($_SESSION['id']);
    //     $follow = $this->pdo->prepare("INSERT INTO follow (id_follower, date_follow) VALUES (:id_follower, NOW()");
    //     $follow->bindParam(':id_follower',$getid, PDO::PARAM_INT);
    //     $follow->execute();
    // }
}
?>