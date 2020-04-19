<?php

include 'FileUploadHandler.php';

$loader = new FileUploadHandler;
$result = $loader->make();
if (is_array($result)){
  print_r($result);
} else {
  echo $result;
}

// 返回上传到服务器的图片信息数组
// Array
// (
//     [0] => Array
//         (
//             [name] => 2020-04-15 下午1.33.43.png
//             [path] => dest/2020/04/19/fa90ddb92d06571fdcfcf36d7ca0615c.png
//             [size] => 1350112
//         )

//     [1] => Array
//         (
//             [name] => 2020-04-17 下午8.09.34.png
//             [path] => dest/2020/04/19/cde77f33152be265db07b6788186628f.png
//             [size] => 494639
//         )

//     [2] => Array
//         (
//             [name] => 2020-04-13 下午5.26.15.png
//             [path] => dest/2020/04/19/b03931cbbb272188cfe473ce55a9b396.png
//             [size] => 482269
//         )

//     [3] => Array
//         (
//             [name] => 2020-04-18 下午7.57.49.png
//             [path] => dest/2020/04/19/99ea6bec5c2a80ddbb4006d504f7979d.png
//             [size] => 1091740
//         )

// )