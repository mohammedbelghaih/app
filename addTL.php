<?php
    session_start();
    include("./App/addlist.php");
    if(isset($_SESSION["user"])){
    $db=new App\addlist();
    require("form.php");
    $form=new form();
    $id=$_SESSION["user"];
    $dd=$db->sql("select * from users where id_U='$id'");
    if(isset($_POST["add"])){
        $name=$_POST["name"];
        $color=$_POST["color"];
        $id=$_SESSION["user"];
        $db->add($name,$color,$id);
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

    <title>Ajouter</title>
</head>
<body>
    <?php include("./nav/nav.php"); ?>
    <section class="insc">
        <div class="fr">   
            <form method="POST" class="container">
                <div class="form-group">
                    <?php
                        echo $form->label("exampleInputEmail1","Titre");
                        echo $form->inputs("text","name","form-control","exampleInputEmail1");
                    ?>
                </div>
                <div class="form-group  colo">
                    <?php 
                        echo $form->label("exampleInputEmail1","Couleur");
                        echo $form->inputs("color","color","form-control br","exampleInputPassword1");
                    ?>
                </div>
                <center>
                    <?php echo $form->button("add","btn btn-primary bt","Ajouter"); ?>    
                </center>
            </form>
        </div>
    </section>
    <?php
        }else{
            header("location:login.php");
        }
    ?>
</body>
</html>