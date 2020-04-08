<?php
/**
 * desc 简单选择排序 
 */

/**
 * @param $data array
 * @return array 
 */
function selectSort(array $data = [])
{
    $len = count($data);
    for ($i = 0; $i < $len; $i ++)
    {
        $k = $i;
        for ($j = $i + 1; $j < $len; $j ++)
        {
            if ($data[$k] > $data[$j])
            {
                $k = $j;
            }
        }
        if ($k != $i)
        {
            $temp = $data[$k];
            $data[$k] = $data[$i];
            $data[$i] = $temp;
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
    [0] => 8
    [1] => 35
    [2] => 3
    [3] => 26
    [4] => 44
    [5] => 4
    [6] => 55
    [7] => 86
    [8] => 78
    [9] => 92
)
*/
//打印测试排序后的结果
print_r(selectSort($test_data));

//结果
/*
Array
(
    [0] => 3
    [1] => 4
    [2] => 8
    [3] => 26
    [4] => 35
    [5] => 44
    [6] => 55
    [7] => 78
    [8] => 86
    [9] => 92
)
*/