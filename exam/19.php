<?php return
array (
  'title' => '数学测试',
  'timeout' => 300,
  'exam_type' => '数学',
  'data' => 
  array (
    'binary' => 
    array (
      'name' => '判断题',
      'score' => 1,
      'data' => 
      array (
        1 => 
        array (
          'question' => '1+1=2',
          'answer' => 
          array (
            0 => 'A',
          ),
          'option' => 
          array (
            'A' => '对',
            'B' => '错',
          ),
        ),
      ),
    ),
    'single' => 
    array (
      'name' => '选择题',
      'score' => 0,
      'data' => 
      array (
        1 => 
        array (
          'question' => '1+2=',
          'option' => 
          array (
            'A' => '1',
            'B' => '2',
            'C' => '3',
            'D' => '4',
          ),
          'answer' => 
          array (
            0 => 'C',
          ),
        ),
      ),
    ),
    'multiple' => 
    array (
      'name' => '多选题',
      'score' => 3,
      'data' => 
      array (
        1 => 
        array (
          'question' => '4可以拆成',
          'option' => 
          array (
            'A' => '1和1',
            'B' => '1和2',
            'C' => '1和3',
            'D' => '2和2',
          ),
          'answer' => 
          array (
            0 => 'C',
            1 => 'D',
          ),
        ),
      ),
    ),
  ),
);
?>