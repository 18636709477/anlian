<?php
header("content-type:text/html;charset=utf-8");
$conn=new mysqli("localhost","root","root","anlian");
$data=$_POST;
$name=NULL;
$tel=$data['tel'];
$head=NULL;
$talk=NULL;
mysqli_query($conn,"INSERT INTO data (name,tel,head,talk) VALUES('?','{$tel}','?','?')");
echo 1;
?>
