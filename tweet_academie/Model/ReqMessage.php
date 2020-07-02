<?php 
require_once "database.php";

class ReqMessage extends Database
{
    private $userMessage;
    public function __construct(){
        $this->userMessage = new ReqMessage();
    }
    public function ViewMessage(){
        try{
            $mes = $this->pdo->prepare("SELECT message,date_envoi FROM private_message ORDER BY date_envoi DESC LIMIT 20 ");
            $mes -> bindParam(":message",$texte,PDO::PARAM_STR);
            $mes -> execute();
            $resultat = $mes -> fetchAll();
            echo json_encode($resultat);
        }catch(PDOException $e){
            $e ->getMessage();
        }
        
    }
    
    
    public function ReqMessage()
    {
        try{
            $reqM = $this->pdo->prepare("INSERT INTO private_message(id_user_to,id_user_from,message,date_envoie) VALUES :id_user_to,:id_user_from,:message,NOW()");
            $reqM -> bindParam(":id_user_to" , $userSend,PDO::PARAM_INT);
            $reqM -> bindParam(":id_user_from",$userReceive,PDO::PARAM_INT);
            $reqM -> bindParam(":message",$texte,PDO::PARAM_STR);
            $reqM -> execute();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
    // public function ReqIdMessage(){
        //     try{
            //         $reqIdM = $this->pdo->prepare("SELECT id FROM members WHERE id = :id");
            //         $reqIdM -> bindParam(":id",$_SESSION["id"],PDO::PARAM_INT);
            //         $reqIdM -> execute();
            //     }
            //     catch(PDOException $e){
                //         $e -> getMessage();
                //     }
                // }
                public function SendMessage(){
                    try{
                        $reqSend = $this->pdo->prepare("SELECT id FROM members WHERE id = :username");
                        $reqSend -> bindParam(":username",$userId,PDO::PARAM_STR);
                        $reqSend -> execute();
                        
                    }catch(PDOException $e){
                        $e -> getMessage();
                    }
                }
                
                public function RecupId($User){
                    try{
                        // selectionne un utilisateur par rapport son nom et ensuite je recupere l'id de l'autre utilisateur par son username 
                        $User = $this->pdo->prepare("SELECT username FROM members WHERE id = username");
                        $User -> bindParam(":username",$username,PDO::PARAM_STR);
                        $User -> execute();
                    }catch(PDOException $e){
                        $e -> getMessage();
                    }
                    
                }
                
                public function AffichProfSend(){
                    $req = $this->pdo->prepare("SELECT username FROM members");
                    $req -> execute();
                }
                //////////RECHERCHE DE NOM//////////////////////////
                public function rechercheNom()
                {
                    // print "requeteUser avant la condition";?><br/><?php
                    $membre = $_POST['membre'];
                    if(isset($membre)){
                        print "requeteUser dans la condition";?><br/><?php
                        $requeNom = $this->pdo->prepare("SELECT * FROM members WHERE username LIKE ?");
                        $requeNom->execute(array($membre ."%"));
                        while ($cherche = $requeNom->fetch()) {
                            print $cherche["username"];?><br/><?php
                        }
                        $requeNom->closeCursor();
                    }else{
                        print "Je suis dans le else";
                    }
                }
            }
            // Comment lié deux requetes ? -> Comment recuperer l'id de la table membre et l'envoyé dans la table private_message ? 