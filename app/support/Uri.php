<?php

namespace App\support;

class Uri
{
  public static function get(): string
  {
    return $_SERVER['REQUEST_URI'];
  }
}
