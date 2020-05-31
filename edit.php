<?php
    session_start();
    include("./App/addtask.php");
    $t=new App\edittask();
    $db=new App\Database();
    if(isset($_SESSION["user"])){
    $id=$_SESSION["user"];
    $dd=$db->sql("select * from users where id_U='$id'");
    if(isset($_POST["submit"])){
        $T=$_GET['idt'];
        $text=$_POST["taskText"];
        $t->etask($text,$T);
    }
    
    require("form.php");
    $form=new form();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <?php include("./nav/nav.php"); ?>
        <section class="insc">
            <div class="fr">   
                <form method="POST" class="container">
                    <div class="form-group">
                        <?php
                            echo $form->label("formGroupExampleInput","modifier le task");
                        ?>
                        <?php
                            echo $form->inputs("text","taskText","form-control","formGroupExampleInput");
                        ?>
                    </div>                   
                        <?php echo $form->button("submit","btn btn-primary btnb","modifier"); ?>   
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