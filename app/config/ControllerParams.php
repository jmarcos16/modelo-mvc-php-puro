<?php

namespace App\config;

use App\routes\Route;
use App\support\Method;
use App\support\Uri;

class ControllerParams
{
  public function get(array $router)
  {
    $method = Method::get();
    $allRoutes = Route::getRoutes();

    $router = array_filter($allRoutes[$method], function ($item) use ($router) {
      if ($item === $router) {
        return array_keys($item);
      }
    });

    $filterParams = $this->filterParamsOfIdex($router);

    return array_values($filterParams)[0];
  }

  private function filterParamsOfIdex(array $router)
  {

    $explodeUri = explode('/', Uri::get());
    $explodeRouter = explode('/', array_keys($router)[0]);

    $params = [];

    foreach ($explodeRouter as $index => $RouterSegment) {
      if ($RouterSegment !== $explodeUri[$index]) {
        $params[$index] = $explodeUri[$index];
      }
    }

    return $params;
  }
}
