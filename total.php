<?php
//获取题库ID
function getTestId(){
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    return max($id, 1);
}
//根据题库序号载入题库,判断题库是否存在,然后对题库进行转义
function getDataById($id, $toHTML = true)
{
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
function toHTML($str)
{
    $str = htmlspecialchars($str, ENT_QUOTES);
    return str_replace(' ', '&nbsp;', $str);
}

//获取题库信息
function getDataInfo($data)
{
    $count = [];
    $score = [];
    //从题库读取信息
    foreach ($data as $k => $v) {
        //计算各题型的提目数量
        $count[$k] = count($v['data']);
        $score[$k] = round($v['score'] / $count[$k]);
    }
    return [$count, $score];
}

if (isset($_POST["submit"]) && $_POST["submit"] == '交卷') {
    $id = getTestId();
    $right_answer = getDataById($id);
    list($count, $score) = getDataInfo($right_answer['data']);
    $submit_answer = $_POST;
    // echo '<pre>';
    // var_dump($right_answer);
    // var_dump($submit_answer);
    $status = array();
    $res = 0;
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
                    $tem2 = ($i + 1) % 2;
                    if ($key != "binary") {
                        $tem2 = chr($i + 65);
                    }

                    if (in_array($tem2, $sub_array) && in_array($tem2, $v["answer"])) {
                        $status[$key][$k][] = "success";
                    } else if (in_array($tem2, $sub_array)) {
                        $status[$key][$k][] = "wrong";
                    } else if (in_array($tem2, $v["answer"])) {
                        $status[$key][$k][] = "success";
                    } else {
                        $status[$key][$k][] = "none";
                    }
                }
                if ($v["answer"] == $sub_array) {
                    $res++;
                }
            } else {
                for ($i = 0; $i < $tem; $i++) {
                    $tem2 = ($i + 1) % 2;
                    if ($key != "binary") {
                        $tem2 = chr($i + 65);
                    }
                    if (in_array($tem2, $v["answer"])) {
                        $status[$key][$k][] = "success";
                    } else {
                        $status[$key][$k][] = "none";
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
