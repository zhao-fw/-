<?php return
array (
  'title' => '演示',
  'timeout' => 600,
  'exam_type' => '计算机',
  'data' => 
  array (
    'binary' => 
    array (
      'name' => '判断题',
      'score' => 4,
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
        2 => 
        array (
          'question' => '李白是宋代的',
          'option' => 
          array (
            'A' => '对',
            'B' => '错',
          ),
          'answer' => 
          array (
            0 => 'B',
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
            'A' => '0',
            'B' => '1',
            'C' => '2',
            'D' => '3',
          ),
          'answer' => 
          array (
            0 => 'D',
          ),
        ),
      ),
    ),
    'multiple' => 
    array (
      'name' => '多选题',
      'score' => 5,
      'data' => 
      array (
        1 => 
        array (
          'question' => '下列诗歌中，是李白的诗歌的是：',
          'answer' => 
          array (
            0 => 'A',
            1 => 'C',
            2 => 'D',
          ),
          'option' => 
          array (
            'A' => '蜀道难',
            'B' => '清明',
            'C' => '将进酒',
            'D' => '静夜思',
          ),
        ),
      ),
    ),
  ),
);
?>