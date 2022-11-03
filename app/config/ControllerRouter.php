<?php

namespace App\config;

use Exception;

class ControllerRouter
{
  public function execute(string $route)
  {
    if (!str_contains($route, '@')) {
      throw new Exception('Route format invalid');
    }

    list($controller, $function) = explode('@', $route);

    $namespace = "App\controllers\\";
    $controllerNamespace = $namespace . $controller;

    if (!class_exists($controllerNamespace)) {
      throw new Exception($controllerNamespace . ' not found ');
    }

    $controller = new $controllerNamespace;

    if (!method_exists($controller, $function)) {
      throw new Exception($function . ' not found in ' . $controllerNamespace);
    }



    $controller->$function();
  }
}
