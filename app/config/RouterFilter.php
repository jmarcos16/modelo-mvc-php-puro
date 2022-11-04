<?php

namespace App\config;

use App\routes\Route;
use App\support\Uri;
use App\support\Method;
use Exception;

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


  private function filterDynemicsRoutes(array $routes)
  {

    foreach (array_keys($routes) as $value) {
      if (!preg_match("/{[a-z]+}/", $value)) {
        unset($routes[$value]);
      }
    }

    return $routes;
  }

  private function limitParamsRoutes(string $router): void
  {
    $explodeRouterCount = count(explode('/', $router));
    $explodeUriCount = count(explode('/',  rtrim($this->uri, '/')));

    if ($explodeRouterCount > $explodeUriCount) {
      throw new Exception('Estimated parameter in the Url');
    } else if ($explodeRouterCount < $explodeUriCount) {
      throw new Exception('Unexpected parameter in the Url');
    }
  }

  private function simpleRouter()
  {

    if (in_array($this->uri, array_keys($this->routesRegistered[$this->method]))) {
      return $this->routesRegistered[$this->method][$this->uri];
    }

    return null;
  }

  private function daynemicRouter()
  {

    $filterRoutes = $this->filterDynemicsRoutes($this->routesRegistered[$this->method]);

    foreach ($filterRoutes as $index => $route) {
      $regex = str_replace('/', '\/', ltrim(preg_replace("/{[a-z]+}/", '', $index), '/'));

      if (preg_match("/^$regex/", trim($this->uri, '/'))) {
        $validateCountParams = $this->limitParamsRoutes($index);
        $routerRegisteredFound = $route;
        break;
      } else {
        $routerRegisteredFound = null;
      }
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

    throw new Exception('Router not found');
  }
}
