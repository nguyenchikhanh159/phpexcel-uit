<?php

 $connect= mysqli_connect('localhost','root','','excel_students');
 $connect->set_charset('utf8');
if ($connect->connect_error) {
    die("Không kết nối :" . $connect->connect_error);
    exit();
}
?>