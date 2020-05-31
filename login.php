<?php 
    session_start();
    include("./App/Database.php");

    $db=new App\Database();
    if(isset($_POST["submit"])){
        $username=$_POST["username"];
        $password=$_POST["password"];
        $db->login($username,$password);
        $_SESSION["user"]=$db->user;
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
    <title>Login</title>
</head>
<body id="login">
    <section class="log">
        <div class="frm" >
            <form method="POST"  class="log">
            <div class="form-group">
                <?php 
                    echo $form->label("exampleInputEmail1","Username");
                ?>
                <span><?php echo $db->validation(); ?></span>
                <?php
                    echo $form->inputs("text","username","form-control","exampleInputEmail1");
                ?>
            </div>
            <div class="form-group">
                <?php 
                    echo $form->label("exampleInputPassword1","Password");
                    echo $form->inputs("password","password","form-control","exampleInputPassword1");
                ?>
            </div>
            <center>
            <?php
                echo $form->button("submit","btn btn-primary btnb","Se connecter");
            ?>
            <div class="register"><a href="inscription.php">inscrivez vous!</a></div>
            </center>
            </form>
        </div>
    </section>
</body>

</html>
