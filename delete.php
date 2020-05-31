<?php
    session_start();
    include("./App/addtask.php");
    $t=new App\deleltetask();
    $l=new App\deleltelist();
    $db=new App\Database();
    $T=$_GET["dl"];
    $L=$_GET["dll"];
    $t->delete($T);
    $l->delete($L);
?>