<?php
    session_start();
    include("./App/addtask.php");
    if(isset($_SESSION["user"])){
    $t=new App\addtask();
    $db=new App\Database();
    $id=$_SESSION["user"];
    $result=$db->sql("select * from todolist where user_id='$id'");
    $dd=$db->sql("select * from users where id_U='$id'");
    if(isset($_POST["submit"])){
        $idtl= $_POST["idtl"];
        $task=$_POST["task"]; 
        $t->task($task,$idtl);
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
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>add task</title>
</head>
<body>
    <?php include("./nav/nav.php"); ?>
    <section class="insc">
        <div class="fr">   
            <form method="POST" class="container">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">todolist</label>
                    <select class="form-control" name="idtl">
                    <?php foreach($result as $name){ ?>
                    <option value="<?php echo $name["id_L"]; ?>"><?php echo $name["name"]; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <?php
                        echo $form->label("formGroupExampleInput","task");
                    ?>
                    <?php
                        echo $form->inputs("text","task","form-control","formGroupExampleInput");
                    ?>
                </div>               
                    <?php echo $form->button("submit","btn btn-primary bt","Ajouter"); ?>               
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