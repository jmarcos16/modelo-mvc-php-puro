<?php

namespace App\routes;


class Route
{


  private static array $routes;

  public static function getRoutes()
  {

    return self::$routes;
  }

  public static function get(string $uri, array $controller)
  {
    self::$routes['get'][$uri] = $controller;
    return self::$routes;
  }

  public static function post(string $uri, array $controller)
  {
    self::$routes['post'][$uri] = $controller;
    return self::$routes;
  }

  public static function dekete(string $uri, array $controller)
  {
    self::$routes['delete'][$uri] = $controller;
    return self::$routes;
  }
}
