<?php
//index.php

if(!isset($_COOKIE["type"]))
{
 header("location:Pages/dashborad.php");
 //header("location:Pages/login.php");
}else {

 header("location:Pages/dashborad.php");
}

?>
