<?php
header("content-type:text/html;charset=utf-8");
$conn=new mysqli("localhost","root","root","anlian");
$data=$_POST;
$name=$data['name'];
$tel=$data['tel'];
$head=$data['head'];
$talk=$data['talk'];
mysqli_query($conn,"UPDATE data SET name='{$name}' ,head='{$head}',talk='{$talk}' where tel='{$tel}'");
// mysqli_query($conn,"UPDATE kecheng set kechengming='{$xian}' ,shijian='{$shijian}' where kechengming='{$yuan}'");
echo 1;
?>