<?php
/**
 * desc 快速排序 
 */

 /**
  * @param $data array
  * @return array
  */
function quickSort(array $data = [])
{
    $len = count($data);
    if ($len <= 1) 
    {
        return $data;
    }

    $p_value = $data[0]; //先定义一个基准分割值
    $left = $right = []; //left right 分别存放比基准值小，大的值
    for ($i = 1; $i < $len; $i ++)
    {
        if ($data[$i] > $p_value)
        {
            $right[] = $data[$i];
        } else {
            $left[] = $data[$i];
        }
    }

    $left = quickSort($left);
    $right = quickSort($right);
    return array_merge($left, [$p_value], $right);
}


//测试示例
$test_data = [];
for ($i = 0; $i < 10; $i ++)
{
    $test_data[] = mt_rand(1,100);
}

//打印测试数据
print_r($test_data);

/*
Array
Array
(
    [0] => 86
    [1] => 97
    [2] => 49
    [3] => 34
    [4] => 64
    [5] => 49
    [6] => 69
    [7] => 62
    [8] => 3
    [9] => 80
)
*/
//打印测试排序后的结果
print_r(quickSort($test_data));

//结果
/*
Array
(
    [0] => 3
    [1] => 34
    [2] => 49
    [3] => 49
    [4] => 62
    [5] => 64
    [6] => 69
    [7] => 80
    [8] => 86
    [9] => 97
)
*/