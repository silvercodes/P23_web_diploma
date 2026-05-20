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


//$factor = 3;
//$callback = function($x) use (&$factor) {
//    return $x * $factor;
//};
//
//echo $callback(4);




//function createUser($name, $email, $role = 'user') {
//    echo 'OK';
//}
//
//createUser(email: 'vasia@mail.com');




// ==============  callable / closure =============

// new Closure();      // ERROR

//function execute(array $items, callable $callback) {
//    $result = [];
//
//    foreach ($items as $item) {
//        $result[] = $callback($item);
//    }
//
//    return $result;
//}
//
//$doubled = execute([1, 2, 3], function($n) {
//    return $n * 2;
//});
//
//var_dump($doubled);




//$res1 = array_map(fn($n) => $n ** 2, [2, 3, 4]);
//var_dump($res1);
//echo '<br>';
//$even = array_filter([1, 2, 3, 4], fn($n) => $n % 2 === 0);
//var_dump($even);
//$sum = array_reduce([1, 2, 3, 4], fn($sum, $n) => $sum + $n, 0);
//echo '<br>';
//var_dump($sum);




//function createMultiplayer($factor) {
//    return function($value) use ($factor) {
//        return $value * $factor;
//    };
//}
//
//$double = createMultiplayer(2);
//$triple = createMultiplayer(3);
//
//echo $double(5);
//echo '<br>';
//echo $triple(5);




//class User {
//    private $name = 'Vasia';
//
//    public function getBinder() {
//        return function() {
//            return $this->name;
//        };
//    }
//}
//
//$user = new User();
//$binder = $user->getBinder();
//
//// TODO: ??? Vasia ???
//echo $binder();
//
//$bound = $binder->bindTo($user);
//echo $bound();




//$result = collect($items)
//    ->filter(fn($item) => $item > 0)
//    ->map(fn($item) => $item * 2)
//    ->reduce(fn ($result, $i) => $result + $i);



//$callback = fn(int|null $a, int $b): int => $a + $b;




// ================= callable ==================

// 1. String

//function func(string $name): string {
//    return "Hello $name";
//}
//
//$callback = 'func';
//echo $callback('Vasia');
//
//echo call_user_func($callback, 'Vasia');



// 2. Array

//class Executor {
//    function func(string $name): string {
//        return "Hello {$name}";
//    }
//
//    public static function add(int $a, int $b): int {
//        return $a + $b;
//    }
//}
//
////$obj = new Exucutor();
////$callback = [$obj, 'func'];
////
////echo $callback('Vasia');
////echo '<br>';
////echo call_user_func([$obj, 'func'], 'Petya');
//
//
//$callback = ['Executor', 'add'];
//echo $callback(3, 4);




// 3. Closure

//$callback = function(string $name): string {
//    return "Hello {$name}";
//};
//
//echo call_user_func($callback, 'Vasia');




// 4. Arrow function

//$callback = fn(string $name): string => "Hello $name";
//echo $callback('Petya');




// 5. Object with __invoke()

//class Executor
//{
//    public function __invoke(string $name): string {
//        return "Hello {$name}";
//    }
//}
//
//$obj = new Executor();
//echo $obj('Vasia');




// ==========================================

class EventDispatcher
{
    private array $listeners = [];

    public function addListener(string $event, callable $callback): void {
        $this->listeners[$event][] = $callback;
    }

    public function dispatch(string $event, mixed $data = null): void {
        foreach ($this->listeners[$event] as $listener) {
            $listener($data);
        }
    }
}

$disp = new EventDispatcher();

$disp->addListener('user.created', 'sendWelcomeEmail');

$disp->addListener('user.created', function($user) {
    echo "Hello {$user['name']}!";
});

$disp->addListener('user.created', new LogListener());

$disp->addListener('user.updated', fn($u) => log($u));

$disp->addListener('user.updated', [$controoler, 'create']);



