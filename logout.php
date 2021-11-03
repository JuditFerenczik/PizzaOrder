<?php
session_start();
unset($_SESSION["uname"]);
header("Location:index.php?menu=bejelentkezes");
?>

