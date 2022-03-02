<?php
//session start
session_start();
if(isset($_SESSION['username'])){
    echo " welcome" . $_SESSION['username'];
    echo " <br> your password is" .$_SESSION['password'];
}else{
    echo"please log in to continue";
}


?>