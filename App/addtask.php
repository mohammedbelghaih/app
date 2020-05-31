<?php
    namespace App;
    include("Database.php");

    class addtask extends Database{
        public function task($task, $idtl){
            $sql="insert into task(taskText,todolist_id) values(:task, :idtl)";
            $prepare=$this->getpdo()->prepare($sql);
            $execute=$prepare->execute([":task"=>$task, ":idtl"=>$idtl]);
            if($execute){
                header("location:addT.php");
            }else{
                echo "error";
            }
        }
    }
    class edittask extends Database{
        public function etask($text,$T){
            $sql="update task set taskText='$text' where id_T='$T'";
            $query=$this->getpdo()->query($sql);
            $dd=$query->rowCount();
            if($dd>0){
                echo "";
            }else{
                echo "Error";
            }

        }
    }

    class deleltetask extends Database{
        public function delete($T){
            $sql="delete from task where id_T='$T'";
            $query=$this->getpdo()->query($sql);
            $dd=$query->rowCount();
            if($dd>0){
               
                header('location:indexx.php');              
            }else{
                echo "Error";
            } 

        }
    }

    class deleltelist extends Database{
        public function delete($L){
            $sql="delete from todolist where id_L='$L'";
            $query=$this->getpdo()->query($sql);
            $dd=$query->rowCount();
            if($dd>0){
               
                header('location:indexx.php');              
            }else{
                echo "Error";
            } 

        }
    }

    
    
    
?>