<?php

// E_ERROR    Фатальная
// E_WARNING  Предупреждение
// E_NOTICE   Уведомление
// E_PARSE    Ошибка парсинга
// E_STRICT   Рекомендации


set_error_handler(function($errno, $errstr, $errfile, $errline) {

});


class validationException extends \Exception
{
  private $field;

  public function __construct($field, $message, $code = 0)
  {
    $this->field = $field;
    parent::__construct($message, $code);
  }
}
