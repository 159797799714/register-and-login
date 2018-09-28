<?php
    // 获取用户名
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin:*");
    include "public/connect_db.php";
    $json = json_decode(file_get_contents("php://input"));
    $username = $json -> username;
    $password = $json -> password;
    $coon = new db();
    $sql="SELECT * from user_info WHERE username = '$username' and password = '$password'";
    $row = $coon->Query($sql, 2);
    // 找到数据
    if($row) {
      $arr = array("id" => $row["id"], "username"=> $row["username"]);
      // 返回用户基本信息
      $array = array("code"=>"200", "msg"=> "", "data"=>  $arr);
      
    } else {
      $array = array("code"=>"1001", "msg"=> "账号或者密码错误！！");
    }
    echo json_encode($array);
  ?>