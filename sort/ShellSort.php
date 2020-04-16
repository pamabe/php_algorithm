<?php
/**
 * desc 希尔排序
 */

/**
 * @param $data array 
 * @param $step array
 * @return array
 */
function ShellSort($data = [], $steps = [])
{
    $len = count($data);
    foreach ($steps as $step)
    {
        for ($i = $step; $i < $len; $i ++)
        {
            $temp = $data[$i];
            for ($j = $i - $step; $j >= 0; $j = $j - $step)
            {
                if ($temp < $data[$j])
                {
                    $data[$j + $step] = $data[$j];
                } else {
                    break;
                }  
            }
            if ($j != $i - $step)
            {
                $data[$j + $step] = $temp;
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

//步长增量数组[*,*,1]最后一位必须是1
$steps = [5,3,1]; 
//打印测试数据
print_r($test_data);
/*
Array
(
    [0] => 6
    [1] => 93
    [2] => 82
    [3] => 40
    [4] => 56
    [5] => 29
    [6] => 2
    [7] => 65
    [8] => 44
    [9] => 46
)
*/
//打印堆数据
print_r(shellSort($test_data, $steps));
/*
Array
(
    [0] => 2
    [1] => 6
    [2] => 29
    [3] => 40
    [4] => 44
    [5] => 46
    [6] => 56
    [7] => 65
    [8] => 82
    [9] => 93
)
*/