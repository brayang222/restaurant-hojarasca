<?php
echo "Entra al logout";
session_start();
session_destroy();
header("location: login.html");
exit();
?>