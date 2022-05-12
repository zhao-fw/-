<?php return
array (
  'title' => '测试2',
  'timeout' => 60,
  'exam_type' => '无',
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
          'question' => '？？？',
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
          'question' => '？？',
          'answer' => 
          array (
            0 => 'A',
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
    'multiple' => 
    array (
      'name' => '多选题',
      'score' => 3,
      'data' => 
      array (
        1 => 
        array (
          'question' => '？',
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