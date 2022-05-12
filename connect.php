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

    // 判断数据的
    function have_tested($uid, $exam_id) {
        global $mysql;
        $tem_sql = "SELECT * FROM grade WHERE uid='$uid' AND exam_id='$exam_id'";
        $result = $mysql->query($tem_sql);
        if ($result->num_rows > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // 插入数据的
    function insert_exam($exam_name, $exam_time, $exam_type, $teacher_id, $teacher_name) {
        global $mysql;
        $tem_sql = "INSERT INTO exam(exam_id, exam_name, exam_time, exam_type, teacher_id, teacher_name) 
        VALUES (NULL, '$exam_name', $exam_time, '$exam_type', $teacher_id, '$teacher_name')";
        if ($mysql->query($tem_sql) === true) {
            return true;
        }
        else {
            return false;
        }
    }
    function insert_grade($uid, $user_name, $exam_id, $exam_name, $grade) {
        global $mysql;
        $tem_sql = "INSERT INTO grade(uid, user_name, exam_id, exam_name, grade) 
        VALUES ($uid, '$user_name', $exam_id, '$exam_name', $grade)";
        if ($mysql->query($tem_sql) === true) {
            return true;
        }
        else {
            return false;
        }
    }

    // 获取数据的
    function get_role($uid) {
        global $mysql;
        $tem_sql = "select user_role as role from user where uid='$uid'";
        $result = $mysql->query($tem_sql);
        $res = $result->fetch_assoc();
        return $res["role"];
    }

    function get_exam_num() {
        global $mysql;
        $tem_sql = "select max(exam_id) as num from exam";
        $result = $mysql->query($tem_sql);
        return $result->fetch_assoc()["num"];
    }
    
    function get_exam() {
        global $mysql;
        $tem_sql = "select exam_id, exam_name, exam_time, exam_type, teacher_name from exam";
        $result = $mysql->query($tem_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_exam_type() {
        global $mysql;
        $tem_sql = "select exam_type, count(*) as num from exam group by exam_type";
        $result = $mysql->query($tem_sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function get_grade($uid) {
        global $mysql;
        // 当前角色
        $role = get_role($uid);
        // 组装数据
        $res = array();
        $res["title"] = ["考试名称", "用户名", "成绩"];
        $res["data"] = array();
        if ($role == "manager") {
            $tem_sql = "select exam_name, user_name, grade from grade";
            $result = $mysql -> query($tem_sql);
            $res["data"] = $result->fetch_all(MYSQLI_ASSOC);
            // echo "<pre>";
            // print_r($result -> fetch_all(MYSQLI_ASSOC));
        }
        else if ($role == "teacher") {
            $tem_sql = "SELECT g.exam_name, g.user_name, g.grade 
                FROM exam as e, grade as g 
                WHERE e.exam_id=g.exam_id AND e.teacher_id='$uid';";
            $result = $mysql->query($tem_sql);
            $res["data"] = $result->fetch_all(MYSQLI_ASSOC);
        }
        else if ($role == "student") {
            $tem_sql = "SELECT exam_name, user_name, grade FROM grade WHERE uid='$uid'";
            $result = $mysql->query($tem_sql);
            $res["data"] = $result->fetch_all(MYSQLI_ASSOC);
        }
        return $res;
    }
?>