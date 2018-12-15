<?php
    class user{
        private $userid,$username,$usermail,$userpassword;
        
        public function getUser(){
            return $this->userid;
        }
        public function setUser($userid){
            $this->userid=$userid;
        }         
        public function getUserName(){
            return $this->username;
        }
        public function setUserName($username){
           $this->username =$username;
        }
        public function getUserMail(){
           return $this->usermail;
        }
        public function setUserMail($usermail){
            $this->usermail = $usermail;
        }
        public function getUserPassword(){
           return $this->userpassword;
        }
        public function setUserPassword($userpassword){
            $this->userpassword = $userpassword;
        }

        public function InsertUser(){
            Include "conn.php";
            $req = $bd->prepare("INSERT INTO users(username,usermail,userpassword) VALUES(:zusername,:zusermail,:zuserpassword)");
            $req->execute(array(
                "zusername"=>$this->getUserName(),
                "zusermail"=>$this->getUserMail(),
                "zuserpassword"=>$this->getUserPassword()
            ));
        }

        public function UserLogin(){
            include "conn.php";
            $req =$bd->prepare("SELECT * FROM users WHERE usermail=:zusermail AND userpassword = :zuserpassword");

            $req->execute(array(
                "zusermail"=>$this->getUserMail(),
                "zuserpassword"=>$this->getUserPassword()
            ));
            if ($req->rowCount()==0){
                header ("Location: ../index.php?error=1");
                return false;
            }else{
                while($data=$req->fetch()){
                    $this->setUser($data['userid']);
                    $this->setUserName($data['username']);
                    $this->setUserPassword($data['userpassword']);
                    $this->setUserMail($data['usermail']);
                    header ("Location: Home.php");

                    return true;
                }
            }
        }
    }

    class chat{
        private $chatid,$chatuserid,$chattext;

        public function getChatId(){
            return $this->chatid;
        }
        public function setChatId($chatid){
            $this->chatid = $chatid;
        }

        public function getChatUserId(){
            return $this->chatuserid;
        }
        public function setChatUserId($chatuserid){
            $this->chatuserid=$chatuserid;      
        }

        public function getChatText(){
            return $this->chattext;
        }
        public function setChatText($chattext){
            $this->chattext=$chattext;
        }    

        public function InsertChat(){
            include "conn.php";

            $req=$bd->prepare("INSERT INTO chats(chatuserid,chattext) VALUES(:zchatuserid,:zchattext)");

            $req->execute(array(
                'zchatuserid'=>$this->getChatUserId(),
                'zchattext'=>$this->getChatText()
            ));
        } 
        public function DisplayMessage(){
            include "conn.php";
            $chatreq=$bd->prepare("SELECT * FROM chats ORDER BY chatid ");
            $chatreq->execute();

            while($datachat=$chatreq->fetch()){
                $userreq=$bd->prepare("SELECT * FROM users WHERE userid=:zuserid");
                $userreq->execute(array(
                    'zuserid'=>$datachat['chatuserid']
                ));
                $datauser = $userreq->fetch();
?>
            <span style="color:#7CB9E8;"><?php echo $datauser['username'];?></span> Says: <br>
            <span class="chatmessages"><?php echo $datachat['chattext'];?></span><br>
            <?php
            }
        }        
    }
?>