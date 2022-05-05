<?php
//获取题库ID
function getTestId(){
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    return max($id, 1);
}
//根据题库序号载入题库,判断题库是否存在,然后对题库进行转义
function getDataById($id, $toHTML = true){
    $target = "./exam/$id.php";
    if (!file_exists($target)) {
        return false;
    }

    //载入题库
    $data = require $target;

    $func = function ($data) use (&$func) {
        $result = [];
        foreach ($data as $k => $v) {
            //如果是数组则继续递归,如果是字符串则转义
            $result[$k] = is_array($v) ? $func($v) : (is_string($v) ? toHTML($v) : $v);
        }
        //返回数据
        return $result;
    };
    return $toHTML ? $func($data) : $data;
}

//实现html特殊字符转义(特殊字符有:  & " ' < > 和空格)                                                                        //此处的转义函数不起作用
function toHTML($str){
    $str = htmlspecialchars($str, ENT_QUOTES);
    return str_replace(' ', '&nbsp;', $str);
}

//获取题库信息
function getDataInfo($data){
    $count = [];
    $score = [];
    $number = [];
    $i = 1;
    //从题库读取信息
    foreach ($data as $k=>$v){
        //计算各题型的提目数量
        $count[$k] = count($v['data']);
        $score[$k] = round($v['score'] / $count[$k]);
        $number[$k] = $i;
        $i++;
    }
    unset($i);
    return [$count, $score, $number];
}

if (isset($_POST["submit"]) && $_POST["submit"] == '交卷') {
    $id = getTestId();
    $right_answer = getDataById($id);
    list($count, $score, $number) = getDataInfo($right_answer['data']);
    $submit_answer = $_POST;
    // echo '<pre>';
    // var_dump($right_answer);
    // var_dump($submit_answer);
    $status = array();
    $res = 0;
    // 以下为判断每个选项的状态（四种：选择了且正确，选择了且错误，未选择且正确，未选择且错误）
    foreach ($right_answer["data"] as $key => $value) {
        // 每个类型的题
        global $right_answer, $submit_answer, $res, $status;
        $status[$key] = array();
        foreach ($value["data"] as $k => $v) {
            // 每道题的每个选项的状态
            $status[$key][$k] = array();
            $tem = count($v["option"], 0);
            // 每道题
            if (isset($submit_answer[$key][$k])) {
                $sub_array = array();
                // 状态
                if (is_array($submit_answer[$key][$k])) {
                    $sub_array = $submit_answer[$key][$k];
                } else {
                    $sub_array = explode(".", $submit_answer[$key][$k]);
                }
                for ($i = 0; $i < $tem; $i++) {
                    $tem2 = chr($i + 65);

                    // 四种状态
                    if (in_array($tem2, $sub_array) && in_array($tem2, $v["answer"])) {
                        $status[$key][$k][$tem2] = "right";
                    } else if (in_array($tem2, $sub_array)) {
                        $status[$key][$k][$tem2] = "wrong";
                    } else if (in_array($tem2, $v["answer"])) {
                        $status[$key][$k][$tem2] = "right_no_choose";
                    } else {
                        $status[$key][$k][$tem2] = "none";
                    }
                }
                if ($v["answer"] == $sub_array) {
                    $res++;
                }
            } else {
                for ($i = 0; $i < $tem; $i++) {
                    $tem2 = chr($i + 65);
                    // 这是没有选择该题的情况，所以只要两种选择
                    if (in_array($tem2, $v["answer"])) {
                        $status[$key][$k][$tem2] = "right_no_choose";
                    } else {
                        $status[$key][$k][$tem2] = "none";
                    }
                }
            }
        }
    }

    require("./view/total.html");

    // echo '<pre>';
    // var_dump($status);
} else {
    exit;
}
