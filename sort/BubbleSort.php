<?php
/**  
 * desc 冒泡排序
 */


 /**
  * @param $data array
  * @param return array 
  */
function bubbleSort(array $data = [])
{
    $len = count($data);
    for ($i = 0; $i < $len; $i ++)
    {
        for ($j = $i + 1; $j < $len; $j ++)
        {
            if($data[$i] > $data[$j])
            {
                $temp = $data[$i];
                $data[$i] = $data[$j];
                $data[$j] = $temp;
            }
        }
    }
    return $data;
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
(
    [0] => 95
    [1] => 63
    [2] => 56
    [3] => 55
    [4] => 5
    [5] => 28
    [6] => 84
    [7] => 73
    [8] => 70
    [9] => 8
)
*/
//打印测试排序后的结果
print_r(bubbleSort($test_data));

//结果
/*
Array
(
    [0] => 5
    [1] => 8
    [2] => 28
    [3] => 55
    [4] => 56
    [5] => 63
    [6] => 70
    [7] => 73
    [8] => 84
    [9] => 95
)
*/