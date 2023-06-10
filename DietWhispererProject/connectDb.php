<?php

$connection = mysqli_connect("localhost","id20882236_admin","Mysql12.bm*","id20882236_dietwhisperer");
if(!$connection){
    echo "Database Error!<br/>";
    echo "Error: " . mysqli_connect_error();
    exit;
}
mysqli_query($connection, "SET NAMES utf8");
mysqli_query($connection, "SET CHARACTER SET utf8");
mysqli_query($connection, "SET COLLATION_CONNECTION ='utf8_turkish_ci'");

?>