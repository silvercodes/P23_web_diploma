<?php

//interface ILoggable
//{
//  public function log(): void;
//}
//
//interface ISavable
//{
//  public function save(): void;
//}


//class Logger implements ILoggable {
//  public function log(): void
//  {
//    echo 'log';
//  }
//}

//class Store implements ISavable {
////  protected function save()       // ERROR
////  {}
//
////  public function save($data): void     // ERROR
////  {}
//}


//class Store implements ILoggable, ISavable
//{
//
//  public function log(): void
//  {
//    // TODO: Implement log() method.
//  }
//
//  public function save(): void
//  {
//    // TODO: Implement save() method.
//  }
//}



//interface IFileSavable extends ISavable
//{
//  public function store(): void;
//}
//
//
//class Manager implements IFileSavable
//{
//  public function save(): void
//  {
//    // TODO: Implement save() method.
//  }
//
//  public function store(): void
//  {
//    // TODO: Implement store() method.
//  }
//}



// ========== FROM PHP 8.1 ==========
//interface IStatus
//{
//  public const PENDING = 'pending';
//  public const SUCCESS = 'success';
//  public const FAILURE = 'failure';
//}
//
//class Order implements IStatus
//{
//  public function getstatus() {
//    return self::PENDING;
//  }
//}





//class User
//{}
//interface IFactory
//{
//  public static function create(array $data): ?User;
//}
//
//class UserFactory implements IFactory
//{
//  public static function create($data): User
//  {
//    return new User($data);
//  }
//}




// ========= interfaces + abstract classes

//interface IPaymentHandler
//{}
//
//abstract class AbstractHandler implements IPaymentHandler
//{
//
//}
//
//class StripeHandler extends AbstractHandler
//{}
//
//class PayPalHandler extends AbstractHandler
//{}
//
//class OrderController
//{
//  public function createOrder(IPaymentHandler $handler) {
//
//  }
//}






//interface LoggerInterface {
//  public function log(string $message): void;
//}
//
//abstract class AbstractLogger implements LoggerInterface {
//  protected string $logFile;
//
//  public function __construct(string $logFile) {
//    $this->logFile = $logFile;
//  }
//  protected function writeToFile(string $message): void {
//    file_put_contents($this->logFile, $message, FILE_APPEND);
//  }
//
//  abstract public function log(string $message): void;
//}
//
//class FileLogger extends AbstractLogger {
//
//  public function __construct(string $logFile) {
//    parent::__construct($logFile);
//  }
//
//  public function log(string $message): void {
//    $formatted = '[' . date('Y-m-d H:i:s') . '] ' . $message . "\n";
//    $this->writeToFile($formatted);
//  }
//}
//
////class DbLogger extends AbstractLogger {
////  public function log(string $message): void {
////    echo "DB log: $message";
////  }
////}
//
//$logger = new FileLogger('/tmp/app.log');
//$logger->log('Test message');





// ================= traits ======================

//trait Loggable {
//  protected $logFile = '/tmp/log.log';
//
//  public function log(string $message): void {
//    $formatted = '[' . date('Y-m-d H:i:s') . '] ' . $message . "\n";
//    file_put_contents($this->logFile, $message, FILE_APPEND);
//  }
//}
//
//trait Timestamps
//{
//  protected $createdAt;
//  protected $updatedAt;
//  public function touch(): void {
//    $this->updatedAt = time();
//  }
//}
//
//class User {
//  use Loggable;
//
//  public function create() {
//    $this->log('User created');
//  }
//}
//
//class Post {
//  use Loggable, Timestamps;
//
//  public function publish() {
//    $this->log('Post is published');
//    $this->touch();
//  }
//}






//trait A {
//  public function hello() {
//    return 'Hello from A';
//  }
//}
//
//trait B {
//  public function hello() {
//    return 'Hello from B';
//  }
//}
//
//class C {
//  use A, B {
//    A::hello insteadof B;
//    B::hello as helloFromB;
//  }
//
//  public function execute() {
//    $this->hello();
//    $this->helloFromB();
//  }
//}





// Пока не работает :-)
// https://wiki.php.net/rfc/traits-with-interfaces
//interface LoggerInterface {
//  public function log(string $message): void;
//}
//
//trait Loggable implements LoggerInterface {
//
//}






//trait Loggable {
//  abstract protected function getLogContext(): string;
//  public function log(string $message): void {
//    $ctx = $this->getLogContext();
//    //
//    //
//  }
//}
//
//class User {
//  use Loggable;
//  protected function getLogContext(): string
//  {
//    return 'user';
//  }
//}




// ================================

//interface RepositoryInterface {
//  public function find($id): object|null;
//  public function findAll(): array;
//  public function save(object $entity): void;
//  public function delete($id): void;
//}
//
//trait BaseRepository {
//  protected array $storage = [];
//  protected int $nextId = 1;
//
//  public function find($id): object|null {
//    return $this->storage[$id] ?? null;
//  }
//
//  public function findAll(): array {
//    return array_values($this->storage);
//  }
//
//  public function delete($id): void
//  {
//    if (isset($this->storage[$id])) {
//      unset($this->storage[$id]);
//    }
//  }
//
//  protected function getNextId(): int {
//    return ++$this->nextId;
//  }
//}
//
//
//class User {
//  public int $id;
//  public string $name;
//  public string $email;
//  public function __construct(string $name, string $email) {
//    $this->name = $name;
//    $this->email = $email;
//  }
//}
//
//class UserRepository implements RepositoryInterface {
//  use BaseRepository;
//
//  public function save(object $entity): void
//  {
//    if (!isset($entity->id)) {
//      $entity->id = $this->getNextId();
//    }
//
//    $this->storage[$entity->id] = $entity;
//  }
//
//  public function findByName(string $name): array|null {
//    return array_filter($this->storage, fn($u) => $u->name === $name);
//  }
//}
//
//$userRepo = new UserRepository();
//$userRepo->save(new User('vasia', 'vasia@mail.com'));
//$userRepo->save(new User('petya', 'petya@mail.com'));
//
//foreach($userRepo->findAll() as $user) {
//  echo "\n- {$user->name}";
//}
//





