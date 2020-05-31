<?php
    session_start();
    include("./App/Database.php");
    $db=new App\Database();
    $id=$_SESSION["user"];
    if(isset($_SESSION["user"])){
        $result=$db->sql("select * from todolist where user_id='$id'");
        $dd=$db->sql("select * from users where id_U='$id'");
    

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

    <title>Todolist</title>
</head>
<body>
    <?php include("./nav/nav.php"); ?>
    <h4 class="tl">TodoLists</h4>
    <?php foreach($result as $name){
        $_SESSION["name"]=$name["name"];
        ?>
        <div class="card-body vv">
            <h5 class="card-title name"><a href="todolist.php?tl=<?php echo $name['id_L'] ?>" ><?php echo $name["name"];  ?></a></h5>
            <a href="delete.php?dll=<?php echo $name['id_L'] ?>">Supprimer</a>
        </div>
    <?php } ?>
    <?php 
    }else{
        header("location: login.php");
    }
    ?>
</body>
</html>