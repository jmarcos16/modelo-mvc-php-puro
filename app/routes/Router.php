<?php

namespace App\routes;

use Exception;
use App\helpers\Uri;
use App\helpers\Request;

class Router
{

  const CONTROLLER_NAMESPACE = 'App\\controllers';


  public static function load(string $controller, string $method)
  {
    try {
      //Verify if controller exist

      $controllerNamespace = self::CONTROLLER_NAMESPACE . '\\' . $controller;
      if (!class_exists($controllerNamespace)) {
        throw new Exception($controller . ' not found ' . "<br>");
      }
      $controllerIntance = new $controllerNamespace;

      if (!method_exists($controllerIntance, $method)) {
        throw new Exception(" " . $method . ' not found in ' . $controller . "<br>");
      }

      $controllerIntance->$method((object)$_REQUEST);
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }

  public static function routes(): array
  {

    return [
      'get' => [
        '/' => fn () => self::load('HomeController', 'index'),
        '/contact' => fn () => self::load('ContactController', 'index'),
      ],
      'post' => [
        '/contact' => fn () => self::load('ContactController', 'store')
      ],
      'put' => [],
      'delete' => []
    ];
  }

  public static function execute()
  {
    try {
      $routes = self::routes();
      $request =  Request::get();
      $uri = Uri::get('path');

      if (!isset($routes[$request])) {
        throw new Exception(" Route not found ");
      }

      if (!array_key_exists($uri, $routes[$request])) {
        throw new Exception(" Route not found ");
      }

      $router = $routes[$request][$uri];

      if (!is_callable($router)) {
        throw new Exception(" Route ${router} is not callable ");
      }

      $router();
    } catch (\Throwable $th) {

      echo $th;
    }
  }
}
