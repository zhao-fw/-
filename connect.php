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
    
    // user(uid, user_name, user_password, user_role);
    // exam(exam_id, exam_name, exam_time, teacher_id, teacher_name);
    // grade(student_id, student_name, exam_id, exam_name, student_grade);

    function get_role($uid) {
        global $mysql;
        $tem_sql = "select user_role as role from user where uid='$uid'";
        $result = $mysql->query($tem_sql);
        $res = $result->fetch_assoc();
        return $res["role"];
    }

    function insert_exam($exam_name, $exam_time, $teacher_id, $teacher_name) {
        global $mysql;
        $tem_sql = "INSERT INTO exam(exam_id, exam_name, exam_time, teacher_id, teacher_name) 
        VALUES (NULL, $exam_name, $exam_time, $teacher_id, $teacher_name)";
        if ($mysql->query($tem_sql) === true) {
            return true;
        }
        else {
            return false;
        }
    }

    function get_exam() {
        global $mysql;
        $tem_sql = "select exam_name, exam_time, teacher_name from exam";
        $result = $mysql->query($tem_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_grade($uid) {
        global $mysql;
        // 当前角色
        $role = get_role($uid);
        // 组装数据
        $res = array();
        $res["title"] = ["exam_name", "student_name", "student_grade"];
        $res["data"] = array();
        if ($role == "manager") {
            $tem_sql = "select exam_name, student_name, student_grade from grade";
            $result = $mysql -> query($tem_sql);
            $res["data"] = $result->fetch_all(MYSQLI_ASSOC);
            // echo "<pre>";
            // print_r($result -> fetch_all(MYSQLI_ASSOC));
        }
        return $res;
    }
?>