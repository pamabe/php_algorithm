<?php
/**
 * desc 堆排序
 */

/**
 * @param $data array 
 * @return array
 */
function heapSort($data = [])
{
    $len = count($data);
    //建立大根堆
    buildMaxHeap($data, $len); 
    
    while (--$len)
    {
        //交换数据，大根放最后,(因为此为升序)
        swap($data[0], $data[$len]);
        //剩下的堆重整成大根堆
        heapify($data, 0, $len);
        //echo json_encode($data); //可以查看每次执行后排序结果，大数在后
    }
    return $data;
}

 /**
  * desc 建立大根堆
  * @param array
  * @return array 
  */
function buildMaxHeap(&$data = [], $len = 0)
{
    $top_index = floor($len / 2);

    while ($top_index --)
    {
        heapify($data, $top_index, $len);
    }
}

/**
 * desc 堆调整 
 * @param $data array
 * @param $index int
 * @param $len int
 * @return array
 */
function heapify(&$data = [], $index = 0, $len = 0)
{
    //索引大于数组长度退出
    if ($index >= $len) 
    {
        return;
    }

    //左孩子节点索引
    $l_index = $index * 2 + 1;
    //右孩子节点索引
    $r_index = $index * 2 + 2;
    //记录大节点索引
    $max_index = $index;
    //左节点大于根节点，索引交换
    if ($l_index < $len && $data[$l_index] > $data[$max_index])
    {
        $max_index = $l_index;
    }
    //右节点大于根节点，索引交换
    if ($r_index < $len && $data[$r_index] > $data[$max_index])
    {
        $max_index = $r_index;
    }
    //交换节点数据并重新整理堆
    if ($max_index != $index && $max_index < $len) 
    {
        swap($data[$index], $data[$max_index]);
        heapify($data, $max_index, $len);
    }
}

/**
 * desc 交换数据 
 * @param $l_data int
 * @param $r_data int
 */
function swap(&$l_data, &$r_data)
{
    list($l_data,$r_data) = [$r_data, $l_data];
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
    [0] => 70
    [1] => 86
    [2] => 25
    [3] => 94
    [4] => 59
    [5] => 79
    [6] => 85
    [7] => 95
    [8] => 41
    [9] => 22
)
*/
//打印测试排序后的结果
print_r(heapSort($test_data));
/*
(
    [0] => 22
    [1] => 25
    [2] => 41
    [3] => 59
    [4] => 70
    [5] => 79
    [6] => 85
    [7] => 86
    [8] => 94
    [9] => 95
)
*/