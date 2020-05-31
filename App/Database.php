<?php
 namespace App;
use \PDO;
    class Database{
        private $dsn;
        private $dbname;
        private $dbuser;
        private $pass;
        private $pdo;
        private $err="";
        public $user;
        public function __construt($dsn="localhost:3308",$dbname="todolist",$dbuser="root",$pass=""){
            $this->dsn=$dsn;
            $this->$dbname=$dbname;
            $this->$dbuser=$dbuser;
            $this->$pass;
                }
        public function getpdo(){
            $pdo=new PDO('mysql:host=localhost:3308;dbname=todolist','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo=$pdo; 
            return $pdo;
        }
        public function login($username,$password){
            $error="";
            if(!empty($username)AND !empty($password)){
                $query=$this->getpdo()->query("select * from users where username='$username' and pass='$password'");
                $dd=$query->rowCount();
                if($dd>0){
                    foreach($query as $row){
                        $this->user=$row["id_U"];
                    }
                    header("location:indexx.php");
                }else{
                    $error= "*password or username is incorrect";
                }
            }else{
                $error= "*you should enter your username and password";
            }
            $this->err=$error;
            return $error;
        }
        public function validation(){
            return $this->err;
        }

        public function inscription($username,$password,$email,$firstname,$lastname){
            $error="";
            if(!empty($username)AND !empty($password)AND !empty($email)AND !empty($firstname)AND !empty($lastname)){
            $sql="insert into users(username,pass,email,firstname,lastname,photo) values(:username, :password, :email, :firstname, :lastname, :pic)";
            $prepare=$this->getpdo()->prepare($sql);
            $execute=$prepare->execute([":username"=>$username, ":password"=>$password, ":email"=>$email, ":firstname"=>$firstname, ":lastname"=>$lastname]);
                if($execute){
                    echo "done";
                }else{
                    echo "nonononono";
                }
            }else{
                $error= "*you should enter your informations";
            }
            $this->err=$error;
            return $error;
        }
        public function sql($query){
            $dd=$this->getpdo()->query($query);
            $fetch=$dd->fetchAll();

            return $fetch;
        }

        public function getquery($req){
            $sql=$this->getpdo()->query($req);
            $prepare=$sql->prepare($req);
            $execute=$prepare->execute();
            return $execute;
        }
        
    }
    
?>
