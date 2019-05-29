<?php
//�����ռ�ǽ
header("content-type:text/html;charset=utf-8");
$conn=new mysqli("localhost","root","root","anlian");
$sql="SELECT * FROM message ";
$aa=$conn->query($sql);//����һ����Դ��ʶ��  ����
$result = $conn->query($sql);
$arr_aa=array();//��������
// echo $result;
if ($result->num_rows > 0) {
    // �������
    while($row = $result->fetch_assoc()) {
        //���ҵ������ݸ�Ϊ "��������" ��ʽ,����תjson��ʽ
        $arr=array('ID'=>$row["ID"],'title'=> $row["title"],'message'=>$row["message"],'date'=>$row["date"],'image'=>$row["image"]);
        array_push($arr_aa , $arr);
    }
    echo json_encode($arr_aa);
} else {
    echo "0 ";
}
$conn->close();
?>