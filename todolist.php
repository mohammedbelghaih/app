<?php
    session_start();
    include("./App/Database.php");
    $db=new App\Database();
    if(isset($_SESSION["user"])){
    $id=$_SESSION["user"];
    $ll=$_GET["tl"];
    $_SESSION["ll"]=$ll;
    $result=$db->sql("select if(done, 'true', 'false')done, id_T, todolist_id,taskText, id_L, color, user_id from todolist, task where user_id='$id' and todolist_id='$ll' and id_L=$ll GROUP BY id_T");
    


    if(isset($_POST["sub"])){
      
      $T=$_POST["sub"];
      $sql="update task set done = true where id_T='$T'";
      $query=$db->getpdo()->query($sql);
      $dd=$query->rowCount();
      if($dd>0){
        echo "yup";
        header("location:todolist.php?tl=". $ll);
                       
      }else{
        
        $T=$_POST["sub"];
        $sql="update task set done = false where id_T='$T'";
        $query=$db->getpdo()->query($sql);
        $dd=$query->rowCount();
        if($dd>0){
          header("location:todolist.php?tl=". $ll);  
                    echo "yup";
      }
    } 
  }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Tasks</title>
</head>

<body>

  <?php include("./nav/nav.php"); ?>
  <h5 class="titre"><?php echo $_SESSION["name"]; ?></h5>
  <form method="POST">
  <table class="table" id="tab">
    <thead>
      <tr>
        <th scope="col" class="idm">Id</th>
        <th scope="col" style="text-align: center;">Taches</th>
        <th scope="col" style="text-align: center;">Done</th>
        <th scope="col" style="text-align: center;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $tl){ 
        $color = $tl['color'];
        $value = $tl["done"];
        echo "<script>
        function color(){
        document.getElementById('tab').style.backgroundColor='$color';
        }
        color();
      </script>";
      echo "<script>
      function linl() {
      
      document.getElementById('de').style.textDecoration = 'line-through';
           
       }
   linl();
   </script>"
      ?>
      <tr id="de">
        <th scope="row" class="idm" style="width: 10%;"><?php echo $tl["id_T"] ?></th>
        <td style="text-align: center;"><?php echo $tl["taskText"] ?></td>
        <td style="width: 10%;text-align: center;"><input type="button" id="sp" value="<?php echo $tl["done"] ?>" > <input type="submit" onclick="linl()" name="sub" id="done" value="<?php echo $tl["id_T"] ?>"></td>
        <td style="width: 20%;text-align: center;"><a href="edit.php?idt=<?php echo $tl["id_T"]; ?>"><input type="button" value="modifier" class="modifier"></a><a href="delete.php?dl=<?php echo $tl["id_T"]; ?>"><input type="button" value="Supprimer" class="supp"></a></td>
      </tr>
      <?php 
    

    } ?>
      
    </tbody>
  </table>
  </form>
  <?php
  }else{
    header("location:login.php");
  }
  ?>
  



</body>
</html>