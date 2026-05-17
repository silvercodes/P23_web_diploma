<?php

//function func(int $a, int $b = 45): int
//{
//    return $a + $b;
//}
//
//echo func(2, 3);
//// echo func('vasia', 3);



//function process(int|string $value): string
//{
//    if (is_int($value))
//        return "Int: $value" . '<br>';
//    else
//        return "String: $value" . '<br>';
//}
//
//echo process('vasia');
//echo process('23');
//echo process(23);



//$name = 'Vasia';
//
//function func()
//{
//    global $name;
//    echo $name;
//}
//
//func();





//function counter(): void {
//    static $count = 0;
//    $count++;
//    echo $count . '<br>';
//}
//
//counter();
//counter();
//counter();






//$a = 10;
//$b = 20;
//
//function test() {
//    // global $a, $b;
//    $a = $GLOBALS['a'];
//    $b = $GLOBALS['b'];
//
//    echo $a + $b;
//}




//$factor = 3;
//$callback = function($x) use ($factor) {
//    return $x * $factor;
//};
//
//echo $callback(4);


$factor = 3;
$callback = function($x) use (&$factor) {
    return $x * $factor;
};

echo $callback(4);

