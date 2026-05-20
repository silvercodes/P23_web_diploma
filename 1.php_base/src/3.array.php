<?php

//$nums = [1, 2, 3];
//
//$numbers = [
//  0 => 1,
//  1 => 2,
//  2 => 3
//];
//
//$arr = [
//  'id' => 101,
//  'roles' => [
//    'admin',
//    'author'
//  ],
//];
//
//echo "Count: " . count($nums) . "<br>";
//
//array_push($nums, 10);
//print_r($nums);
//
//$last = array_pop($nums);
//
//array_unshift($nums, 0);
//
//$first = array_shift($nums);
//
//echo in_array($first, $nums) ? "YES" : "NO";
//
//echo array_key_exists('name', $arr);



// =========================

//$arr1 = [1, 2, 3];
//$arr2 = array(1, 2, 3);


//$arr = [1, 2, 3];
//$val = $arr[1];
//$arr[0] = 10;
//
//unset($arr[1]);



$users = [
  [
    'name' => 'Vasia',
    'age' => 23,
  ],
  [
    'name' => 'Petya',
    'age' => 24,
  ]
];

echo $users[1]['age'];



$config = [
  'db' => 'database_db',
  'roles' => [
    'admin',
    'guest',
  ],
  'timeout' => 120
];

foreach ($config as $key => $value) {

}

$users[] = [
  'name' => 'Dima',
  'age' => 25,
];

$config['roles'][] = 'author';
