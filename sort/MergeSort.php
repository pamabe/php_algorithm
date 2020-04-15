<?php
/**
 * desc 归并排序
 */

/**
 * @param $data array 
 * @return array
 */
function mergeSort($data = [])
{
    divide($data, 0, count($data) - 1);
    return $data;
}

/**
 * desc 递归分而治之
 * @param $data array 
 * @param $left int
 * @param $right int
 * @return array
 */
function divide(&$data = [], $left = 0, $right = 0)
{
    if ($left < $right)
    {
        //取中间数
        $mid = floor(($left + $right) / 2);
        //左边再次递归
        divide($data, $left, $mid);
        //右边再次递归
        divide($data, $mid + 1, $right); 
        //合并有序的左右数组数据
        merge($data, $left, $mid, $right);
    }
}

/**
 * desc 分而治之有序数组重组
 * @param $data array
 * @param $left int
 * @param $right int
 * @param $sortData array 
 * @return null
 */
function merge(&$data = [], $left = 0, $mid = 0, $right = 0)
{
    $l_i = $left;
    $r_i = $mid + 1; 
    $sortData = [];
    //左右有序数组比较填充
    while ( $l_i <= $mid && $r_i <= $right)
    {
        if ($data[$l_i] < $data[$r_i])
        {
            $sortData[] = $data[$l_i];
            $l_i ++;
        } else {
            $sortData[] = $data[$r_i];
            $r_i ++;
        }
    }
    //如果右边数组有剩余继续填充
    while ($r_i <= $right)
    {
        $sortData[] = $data[$r_i];
        $r_i ++;
    }
    //如果左边数组有剩余继续填充
    while ($l_i <= $mid)
    {
        $sortData[] = $data[$l_i];
        $l_i ++;
    }
    //将$sortData内排序好的部分，写入到$data内：
    for ($i = 0, $len = count($sortData); $i < $len; $i++) {
        $data[$left + $i] = $sortData[$i];
    }
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
    [0] => 35
    [1] => 82
    [2] => 99
    [3] => 71
    [4] => 95
    [5] => 67
    [6] => 75
    [7] => 79
    [8] => 78
    [9] => 56
)
*/
//打印测试排序后的结果
print_r(mergeSort($test_data));

//结果
/*
Array
(
    [0] => 35
    [1] => 56
    [2] => 67
    [3] => 71
    [4] => 75
    [5] => 78
    [6] => 79
    [7] => 82
    [8] => 95
    [9] => 99
)
*/