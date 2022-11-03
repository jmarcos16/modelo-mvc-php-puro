<?php

namespace App\config;

class Router
{
  public static function run()
  {
    try {

      $routerRedistered = new RouterFilter;
      $router =  $routerRedistered->get();
      dd($router);
      // $controller = new ControllerRouter;
      // $controller = $controller->execute($router);
    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
  }
}
