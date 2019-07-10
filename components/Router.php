<?php

class Router
{

  private $routes;

  public function __construct() {
    $this->routes = include(ROOT . '/config/routes.php');
  }

  private function getURI() {
    if (!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

  public function run() {
    $URI = $this->getURI();
    foreach ($this->routes as $patternURI => $path) {
      if (preg_match("~$patternURI~", $URI)) {
        $internalPath = preg_replace("~$patternURI~", $path, $URI);
        $segments = explode('/', $internalPath);
        //var_dump($segments);
        $NameController = ucfirst(array_shift($segments) . 'Controller');
        $actionName = 'action' . ucfirst(array_shift($segments));
        // echo $NameController, $actionName;
        // echo '<br>';
        $controllerPath = ROOT . '/controllers/' . $NameController . '.php';
        if (file_exists($controllerPath)) {
          include_once($controllerPath);
        }
        $controller = new $NameController;
        $result = call_user_func_array(array($controller, $actionName), $segments);
        if ($result != false) {
          break;
        }
      }
    }

  }
}
