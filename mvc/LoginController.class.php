<?php
/*
 * 登录控制器
 */
class LoginController{
    /*
     * 插入方法
     */
      public function register(){
            $data = $_POST;
            $email = $data["email"];
            $username = $data["name"];
            $password = $data["password"];
            $question = $data["question"];
            $answer = $data["answer"];
            $old_data = M()->query_sql("SELECT * FROM user WHERE name='{$username}'");
            $old_data = current($old_data);
            $result = M()->add("user", $data);
                if ($result) {
                    echo ajax_return("200", "插入成功", "");
                    exit;
                } else {
                    echo ajax_return("404", "插入失败", "");
                    exit;
                }
        }
    //新闻详情
    //查询数据库
    public function query(){
        $data = $_GET;
        $tel = $data["tel"];
        $old_data= M()->query_sql("SELECT a.name,a.head,b.date,b.image,b.message from data a join message b on a.tel=b.title WHERE b.title='{$tel}' ");
       $content=count($old_data);
        echo ajax_return($content,'',$old_data);
        // if (!empty($old_data)) {
        //     echo ajax_return("505", "用户名已存在", "");
        //     exit;
        // }
    }
       public function querys(){
        $data = $_POST;
        $page = $data["email"];
        $arr=[];
        $old_data= M()->query_sql("SELECT * FROM user WHERE email='{$page}'");
        $old_data= current($old_data);
        if (!empty($old_data)) {
            echo ajax_return("505", "用户名已存在", $old_data);
            exit;
        }
    }
    /*
     * 登录方法
     */
    public function login(){
            $data = $_POST;
            $username = $data["email"];
            $password = $data["password"];
            $old_data = M()->query_sql("SELECT * FROM user WHERE email='{$username}'");
            $old_data = current($old_data);
            if (empty($old_data)) {
                echo '2';
            }
            else{
                if ($password!== $old_data['password']) {
                    echo '0';
                } else {
                    echo ajax_return("1", $old_data['email'], $old_data['password']);
                }
            }
                
        }
    /*
     * 加密方法
     */
    public function verify($str){
        $str=md5(md5($str)."bokan");
        return $str;
    }
    public function insertke(){
        $data = $_POST;
        $ke = $data["kechengname"];
        $ketime = $data["shijian"];
        $old_data = M()->query_sql("SELECT * FROM kecheng WHERE kechengname='{$ke}'");
            //p($old_data);
            $old_data = current($old_data);//old_data返回的是多维数组，用current方法取数组指针为1的值
            //p($old_data);
                // $data["time"]=$time;
                $result = M()->add("kecheng", $data);
                if ($result) {
                    echo ajax_return("200", "插入成功", $old_data);
                    exit;
                } else {
                    echo ajax_return("404", "插入失败", "");
                    exit;
                }
    }
    public function insertkes(){
        $data = $_POST;
        $ke = $data["banhao"];
        $banzhang = $data["banzhang"];
        $jiaoshi = $data["jiaoshi"];
        $banzhuren = $data["banzhuren"];
        $banjikouhao = $data["banjikouhao"];
        $old_data = M()->query_sql("SELECT * FROM banji WHERE banhao='{$ke}'");
            //p($old_data);
            $old_data = current($old_data);//old_data返回的是多维数组，用current方法取数组指针为1的值
            //p($old_data);
                // $data["time"]=$time;
                $result = M()->add("banji", $data);
                if ($result) {
                    echo ajax_return("200", "插入成功", $old_data);
                    exit;
                } else {
                    echo ajax_return("404", "插入失败", "");
                    exit;
                }
    }
        public function insert(){
        $data = $_POST;
        $xuehao = $data["xuehao"];
        $banhao = $data["banhao"];
        $xingming = $data["xingming"];
        $chusheng = $data["chusheng"];
        //$xingbie = $data["xingbie"];
        $dianhua = $data["dianhua"];
        $old_data = M()->query_sql("SELECT * FROM student WHERE xuehao='{$xuehao}'");
            //p($old_data);
            $old_data = current($old_data);//old_data返回的是多维数组，用current方法取数组指针为1的值
            //p($old_data);
                // $data["time"]=$time;
                $result = M()->add("student", $data);
                if ($result) {
                    echo ajax_return("200", "插入成功", $old_data);
                    exit;
                } else {
                    echo ajax_return("404", "插入失败", "");
                    exit;
                }
    }
     public function chengji(){
        $data = $_POST;
        $xuehao = $data["xuehao"];
        $kechenghao = $data["kechenghao"];
        $chengji = $data["chengji"];
        $old_data = M()->query_sql("SELECT * FROM xuanxiu WHERE xuehao='{$xuehao}'");
            //p($old_data);
            $old_data = current($old_data);//old_data返回的是多维数组，用current方法取数组指针为1的值
            //p($old_data);
                // $data["time"]=$time;
                $result = M()->add("xuanxiu", $data);
                if ($result) {
                    echo ajax_return("200", "插入成功", $old_data);
                    exit;
                } else {
                    echo ajax_return("404", "插入失败", "");
                    exit;
                }
    }
    public function select2(){
    // $data = $_POST;
    $old_data1 = M()->query_sql("SELECT * FROM news");
    $counta=count($old_data1);
    echo ajax_return($counta,'',$old_data1);
    }
    
        public function chaxun1(){
            // $data = $_POST;
            $old_data1 = M()->query_sql("SELECT * FROM data");
            $counta=count($old_data1);
            echo ajax_return($counta,'',$old_data1);
        }
    
     
        public function change1(){
            $data = $_POST;
            $tel = $data['tel'];
            $head = $data['head']; 
            $name = $data['name'];
            $talk = $data['talk'];
            $result=M()->update("data",Array('head'=>"$head",'name'=>"$name",'talk'=>"$talk"),"tel",$tel);
            echo "1";
        }
}