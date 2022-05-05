<?php return
array (
  'title' => '试卷标题',
  'timeout' => '3',
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
          'question' => '题目',
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
      'score' => 2,
      'data' => 
      array (
        1 => 
        array (
          'question' => '题目',
          'option' => 
          array (
            'A' => 'A选项',
            'B' => 'B选项',
            'C' => 'C选项',
            'D' => 'D选项',
          ),
          'answer' => 
          array (
            0 => 'B',
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
          'question' => '题目',
          'answer' => 
          array (
            0 => 'A',
            1 => 'B',
          ),
          'option' => 
          array (
            'A' => 'A选项',
            'B' => 'B选项',
            'C' => 'C选项',
            'D' => 'D选项',
          ),
        ),
      ),
    ),
  ),
);
?>