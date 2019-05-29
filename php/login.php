<?php
header("content-type:text/html;charset=utf-8");
$conn=new mysqli("localhost","root","root","anlian");
$tel=$_GET['tel'];
$sql="SELECT * FROM data WHERE tel='$tel'";
$aa=$conn->query($sql);
$result = $conn->query($sql);
$arr_aa=array();
// echo $result;
if ($result->num_rows > 0) {
    // �������
    while($row = $result->fetch_assoc()) {
        //���ҵ������ݸ�Ϊ "��������" ��ʽ,����תjson��ʽ
        $arr=array('ID'=>$row["ID"],'talk'=>$row["talk"],'name'=>$row["name"],'head'=>$row["head"]);
        array_push($arr_aa , $arr);
    }
    echo json_encode($arr_aa);
} else {
    echo "0 ";
}
$conn->close();
?>