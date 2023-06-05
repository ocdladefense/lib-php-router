<?php 

class ModuleRouter extends Router {


  public function processRoute($request) {
      global $routes;
      ob_start();
      $requestString = substr($request, 1);
      $callback = $routes[$requestString];
      $output = $callback();

      $out = ob_get_contents();
      ob_end_clean();
      return $out;

      $backtrace = debug_backtrace();
      echo '<pre> debug:';
      print_r($backtrace);
      echo '</pre>';
      die("Debug code reached");
  }


}