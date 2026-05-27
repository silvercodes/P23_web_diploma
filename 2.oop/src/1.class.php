<?php

//class User
//{
//  public string $name;    // Это свойство :-)
//  public string $email;
//
//  public function __contruct() {
//
//  }
//
//  public function test(): string {
//    return "Hello $this->name";
//  }
//}
//
//$user = new User();
//$user->name = 'Vasia';
//echo $user->test();
//
//
//class Connection
//{
//  private $host;
//  private bool $connected = false;
//
//  public function __construct($host = 'localhost') {
//    $this->host = $host;
//    $this->connect();
//  }
//  private function connect() {
//    echo "Connection to {$this->host}\n}";
//  }
//  public function __destruct() {
//    //
//    //
//  }
//}


// =========== promoted properties (FROM 8.0)
//class User
//{
//  public function __construct(
//    public string $name,
//    public string $email
//  )
//  {}
//}

//class User
//{
//  public function __construct(
//    public readonly string $name,
//    public string $email
//  )
//  {}
//}


// ========= Property hooks FROM 8.4 =======
//class User
//{
//  private string $_email;
//  public string $email {
//    get => $this->_email;
//    set {
//      $this->_email = $value;
//    }
//  }
//}


//class User
//{
//  private string $_email;
//  public string $email {
//    get => $this->_email;
//    set {
//      if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
//        throw new \InvalidArgumentException("Invalid email");
//      }
//      $this->_email = $value;
//    }
//  }
//}
//
//$user = new User();
//$user->email = 'test@test.com';
//$user->email = 'qwerty';



//class Rect
//{
//  public function __construct(
//    public float $w,
//    public float $h,
//  ) {}
//
//  public float $area {
//    get => $this->w * $this->h;
//  }
//}
//
//$rect = new Rect(100, 200);
//echo $rect->area;



// =========== INHERITANCE ==========

//class Unit
//{
//  protected string $title;
//  public function __construct(string $title) {
//    $this->title = $title;
//  }
//  public function info(): string {
//    return 'INFO';
//  }
//  final public function getTitle(): string {
//    return $this->title;
//  }
//}
//
//class Archer extends Unit
//{
//  public function getLevel(): int {
//    return 10;
//  }
//  public function info(): string {
//    $baseInfo = parent::info();
//    return "$baseInfo Archer INFO";
//  }
//}
//
//$archer = new Archer('vasia');
//
//echo $archer->info();



// ============== Abstract class =================

//abstract class Shape
//{
//  protected string $color = 'default_color';
//  public function __construct(string $color) {
//    $this->color = $color;
//  }
//  abstract public function getArea(): float;
//  public function getColor(): string {
//    return $this->color;
//  }
//}
//
//class Rect extends Shape
//{
//  private float $w;
//  private float $h;
//  public function __construct(string $color, float $w, float $h) {
//    parent::__construct($color);
//    $this->w = $w;
//    $this->h = $h;
//  }
//
//  public function getArea(): float {
//    return $this->w * $this->h;
//  }
//}
//
//$rect = new Rect('red', 3, 4);
//echo $rect->getArea();




// ================= static ================

//class User {
//  public static $prop;
//  public static function execute() {}
//}
//
//echo User::execute();
//
//class Counter {
//  private static $count = 0;
//
//  public function __construct() {
//    self::$count++;
//    echo "Created: " . self::$count . "\n";
//  }
//  public static function getCount() {
//    return self::$count;
//  }
//}




// ===========  $this   self::  static::  parent:: =============
// self::       Compile-time      Класс, где написан код                      Наследование игнорируется     Раннее связывание
// static::     Runtime           Класс, через который произвели вызов        Наследование учитывается      Позднее связывание
// parent::     Compile-time      Непосредственный родитель                   Только родитель

//class ParentClass {
//  public static function who() {
//    echo __CLASS__;
//  }
//  public static function test() {
//    self::who();
//  }
//}
//
//class Child extends ParentClass {
//  public static function who() {
//    echo __CLASS__;
//  }
//}
//
//Child::test();




//class ParentClass {
//  public static function who() {
//    echo __CLASS__;
//  }
//  public static function test() {
//    static::who();
//  }
//}
//
//class Child extends ParentClass {
//  public static function who() {
//    echo __CLASS__;
//  }
//}
//
//Child::test();
//ParentClass::test();



// -- Singleton --

//class Database
//{
//  private static $instances = [];
//
//  protected function __construct() {}
//
//  public static function getInstance() {
//    $class = static::class;       // Получение вызвавшего класса
//
//    if (! isset(self::$instances[$class])) {
//      self::$instances[$class] = new static();
//    }
//
//    return self::$instances[$class];
//  }
//}
//
//class MySQLDatabase extends Database {}
//class PostgresQLDatabase extends Database {}
//
//$mysql = MySQLDatabase::getInstance();
//$pgsql = PostgresQLDatabase::getInstance();



// ---- fabric ------

//class Model {
//  public static function create($data): static
//  {
//    $instance = new static();
//
//    foreach ($data as $key => $value) {
//      $instance->{$key} = $value;
//    }
//
//    return $instance;
//  }
//}
//
//class User extends Model {}
//class Post extends Model {}
//
//$user = User::create(['name' => 'Vasia']);
//$post = Post::create(['title' => 'Hello']);







