<?php
    $db_host = "localhost"; //主机
    $db_username = "root"; //数据库用户名
    $db_password = "110120"; //数据库密码
    $db_name = "test";
    $mysql = new mysqli($db_host, $db_username, $db_password, $db_name);

    if($mysql -> connect_error){
        // 如果链接失败输出错误
        die("can't connect" . $mysql->connection_error);
    }
    else {
        $mysql -> set_charset('utf8'); //  设置数据库字符集
    }
    
    function get_role($uid) {
        global $mysql;
        $tem_sql = "select user_role as role from user where uid='$uid'";
        $result = $mysql->query($tem_sql);
        $res = $result->fetch_assoc();
        return $res["role"];
    }
?>