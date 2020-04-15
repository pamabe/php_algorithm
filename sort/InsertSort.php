<?php
/**
 * desc 插入排序
 */

/**
 * @param $data array 
 * @return array
 */
function insertSort($data = [])
{
    $len = count($data);
    for ($i = 1; $i < $len; $i++)
    {
        $temp = $data[$i];
        for ($j = $i - 1; $j >= 0; $j --)
        {
            if ($temp < $data[$j])
            {
                $data[$j + 1] = $data[$j];
            } else {
                break;
            }
        }

        if ($j != $i - 1)
        {
            $data[$j + 1] = $temp;
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
    [0] => 7
    [1] => 27
    [2] => 22
    [3] => 42
    [4] => 88
    [5] => 4
    [6] => 43
    [7] => 34
    [8] => 89
    [9] => 76
)
*/
//打印测试排序后的结果
print_r(insertSort($test_data));

//结果
/*
Array
Array
(
    [0] => 4
    [1] => 7
    [2] => 22
    [3] => 27
    [4] => 34
    [5] => 42
    [6] => 43
    [7] => 76
    [8] => 88
    [9] => 89
)
*/