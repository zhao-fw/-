<?php return
array (
  'title' => '语文测试',
  'timeout' => 300,
  'exam_type' => '语文',
  'data' => 
  array (
    'binary' => 
    array (
      'name' => '判断题',
      'score' => 2,
      'data' => 
      array (
        1 => 
        array (
          'question' => '李白是男的',
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
          'answer' => 
          array (
            0 => 'B',
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
          'question' => '李白活了多少岁',
          'option' => 
          array (
            'A' => '58',
            'B' => '61',
            'C' => '65',
            'D' => '70',
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
          'question' => '下列诗歌中，是李白的诗歌的是：',
          'answer' => 
          array (
            0 => 'A',
            1 => 'D',
          ),
          'option' => 
          array (
            'A' => '将进酒',
            'B' => '念奴娇·赤壁怀古',
            'C' => '关山月',
            'D' => '春日行',
          ),
        ),
      ),
    ),
  ),
);
?>