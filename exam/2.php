<?php

return[
    'title' => 'PHP基础语法考试(二)',  //试题标题
    'timeout' => 1800,               //答题时限
    'data' => [
        'binary' =>[
            'name'=>'判断题',
            'score'=>20,
            'data'=>[
                1 => [
                  'question'=>'在".php"后缀的文件中，所有的PHP代码都只能写在"<?php ?>"标记内。',
                  'option'=>['A' => '对', 'B' => '错'],
                  'answer'=>['B']
                  ],
                2 => [
                    'question'=>'标量类型包括布尔型、整型、字符串型和数组型。',
                    'option'=>['A' => '对', 'B' => '错'],
                    'answer'=>['B']
                    ],
                3 => [
                    'question'=>'var_dump是PHP中用于打印变量或表达式的类型与值等相关信息的函数。',
                    'option'=>['A' => '对', 'B' => '错'],
                    'answer'=>['A']
                ],
                4 => [
                    'question'=>'如果if语句的代码块中只包含一条语句，那么if语句的大括号可以省略。',
                    'option'=>['A' => '对', 'B' => '错'],
                    'answer'=>['A']
                ],
                5 => [
                    'question'=>'当浮点型数据自动转换为整型数据时，其值将向下取整。',
                    'option'=>['A' => '对', 'B' => '错'],
                    'answer'=>['A']
                ],

            ]
        ],
        'single' => [
            'name' => '单选题','score' => 30,'data' =>[
                1=>[
                    'question'=>'下列选项中，不区分大小写的标识符是（ ）',
                    'option'=>[
                        'A' => '函数名',
                        'B' => '常量名',
                        'C' => '变量名',
                        'D' => '属性名'],
                    'answer' => ['A'],
                ],
                2=>[
                    'question'=>'下列选项中，不能作为常量名的是（ ）',
                    'option'=>[
                        'A' => 'ROOT',
                        'B' => '__PI__',
                        'C' => 'e',
                        'D' => 'CLASS'],
                    'answer' => ['D'],
                ],
                3=>[
                    'question'=>'语句"echo 2+3;"的输出结果是（ ）',
                    'option'=>[
                        'A' => '2+3',
                        'B' => '5',
                        'C' => '程序报错',
                        'D' => '以上答案都不正确'],
                    'answer' => ['B'],
                ],
                4=>[
                    'question'=>'下列选项中，不属于赋值运算符的是（ ）',
                    'option'=>[
                        'A' => '=',
                        'B' => '+=',
                        'C' => '.=',
                        'D' => '=='],
                    'answer' => ['D'],
                ],
                5=>[
                    'question'=>'下面关于多维数组的说法正确的是（ ）',
                    'option'=>[
                        'A' => '所谓多维数组，就是指一个数组的元素又是一个数组',
                        'B' => '所谓多维数组，就是指数组的所有元素必须都是数组',
                        'C' => 'PHP中的数组维数不能超过三维 ',
                        'D' => '以上说法都不正确'],
                    'answer' => ['A'],
                ],
            ]
        ],
        'multiple' => [
            'name'=>'多选题','score'=>30,'data'=>[
                1=>[
                    'question'=>'下列选项中，哪些可以用于输出数组中所有的元素（ )',
                    'option'=>[
                        'A' => 'print_r()',
                        'B' => 'print()',
                        'C' => 'echo()',
                        'D' => 'var_dump()'],
                    'answer' => ['A','D']
                ],
                2=>[
                    'question'=>'下列选项中，可以作为PHP开始标记的是（ ）',
                    'option'=>[
                        'A' => '<?php',
                        'B' => '<%',
                        'C' => '<?',
                        'D' => '<<<;eof'],
                    'answer' => ['A','B','C']
                ],
                3=>[
                    'question'=>'下列选项中，关于文件包含语句写法正确的是（ ）',
                    'option'=>[
                        'A' => 'include "./demo/test.php"',
                        'B' => 'include ./demo/test.php',
                        'C' => 'include("./demo/test.php")',
                        'D' => 'include(./demo/test.php)'],
                    'answer' => ['A','C']
                ],
                4=>[
                    'question'=>'下列选项中，其值可以自动转换为布尔类型值false的是（ ）',
                    'option'=>[
                        'A' => '整型值0',
                        'B' => '空字符串',
                        'C' => 'array( array() )',
                        'D' => '浮点型值0.0'],
                    'answer' => ['A','B','D']
                ],
                5=>[
                    'question'=>'若在当前运行的脚本中需要调用其他文件的函数，可以使用以下哪个语句（ ）',
                    'option'=>[
                        'A' => 'import',
                        'B' => 'namespace',
                        'C' => 'include',
                        'D' => 'require'],
                    'answer' => ['C','D']
                ],
            ]
        ]
    ]
];
?>