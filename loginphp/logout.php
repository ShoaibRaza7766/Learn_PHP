<?php
//session start
session_start();
session_unset();
session_destroy();
echo  "your session has been logout";
?>