<?php

namespace App\controllers;

use League\Plates\Engine;

abstract class Controller
{
  public function view(string $view, array $data = [])
  {

    $pathViews = dirname(__FILE__, 3) . "\\resource" . DIRECTORY_SEPARATOR . 'view';
    $templates = new Engine($pathViews);

    echo $templates->render($view, $data);
  }
}
