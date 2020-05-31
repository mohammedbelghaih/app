<?php
namespace App;
include("Database.php");

    class addlist extends Database{
        public function add($name,$color,$id){
            $sql="insert into todolist(name,color,user_id) values(:name, :color,:id)";
            $prepare=$this->getpdo()->prepare($sql);
            $execute=$prepare->execute([":name"=>$name, ":color"=>$color, ":id"=>$id]);
            if($execute){
               echo "done";
            }else{
                echo "nooonooonooonooonooonoo";
            }
        }
    }
?>

