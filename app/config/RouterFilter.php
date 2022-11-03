<?php

namespace App\config;

use App\routes\Route;
use App\support\Uri;
use App\support\Method;

class RouterFilter
{

  private $uri;
  private $method;
  private $routesRegistered;

  public function __construct()
  {
    $this->uri = Uri::get();
    $this->method = Method::get();
    $this->routesRegistered = Route::getRoutes();
  }

  private function simpleRouter()
  {
    if (in_array($this->uri, $this->routesRegistered[$this->method])) {
      $this->routesRegistered[$this->method];
    }

    return null;
  }

  private function daynemicRouter()
  {
    foreach ($this->routesRegistered[$this->method] as $index => $route) {

      $regex = str_replace('/', '\/', ltrim($index, '/'));
      $regex2 = str_replace('/', '\/', ltrim($this->uri));
      dd($regex2);
      if (preg_match("/^$regex$/", trim($this->uri))) {
        dd("chegou");
      }



      // if ($index !== '/' && preg_match()) {
      //   $routerRegisteredFound = $route;
      //   dd("oui");
      //   break;
      // } else {

      //   $routerRegisteredFound = null;
      // }
    }

    return $routerRegisteredFound;
  }

  public function get()
  {

    $router = $this->simpleRouter();

    if ($router) {
      return $router;
    }

    $router = $this->daynemicRouter();

    if ($router) {
      return $router;
    }

    return [
      0 => "App\controllers\NotFoundController",
      1 => "index"
    ];
  }
}
