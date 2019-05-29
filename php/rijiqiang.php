<?php
//�����ռ�ǽ
header("content-type:text/html;charset=utf-8");
$conn=new mysqli("localhost","root","root","anlian");
// $data=$_GET;
$message=$_GET['message'];
$date=time();
$image=$_GET['image'];
$title=$_GET['title'];
mysqli_query($conn,"INSERT INTO message (message,date,image,title) VALUES('$message','$date','$image',$title)");
// echo json_encode($conn);
echo 1;
$conn->close();
?>