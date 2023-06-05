<?php 
    //require BASE_DIR . '/modules/lanefix/module.php';
    //die("Mod file included");
    //var_dump($_SERVER);
    //["SCRIPT_NAME"]=> string(21) "/LaneFixPHP/index.php"
    //["PATH_INFO"]=> string(5) "/send" 
    // ["REQUEST_URI"]=> string(26) "/LaneFixPHP/index.php/send"
    //var_dump($_SERVER);
    //exit;

  //var_dump($request);
//echo "Request was: " . $request;
//exit;

  //$route = "diag";
  //include $route;
  //pull value of route from server variable
  //determine route based on requst_uri, script_name, path_info in $_SERVER
  // if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != null){
  //   $info = $_SERVER['PATH_INFO'];
  //   echo $info;
  //   $route = "routes/diagnostic.html";
  //   include_once $route;
  //}
function getModules(){
  global $routes;
  $routes = [];
  $justModulesDirectory = BASE_DIR . '/modules';
  $modulesDirectory = BASE_DIR . '/modules/lanefix';
  //$modulesDirectory =  '../modules/lanefix';
  $files = scandir($justModulesDirectory);
  // var_dump($modules);
  // exit;

  foreach ($files as $file){
    if ($file == '.' || $file == '..'){
      continue;
    }
    $foobar = $justModulesDirectory . '/' . $file;
    if (!is_dir($foobar)){
      continue;
    }
    if (!file_exists($foobar . '/module.php')){
      continue;
    }
    require $foobar . '/module.php';
    $fn = $file . '\routes';
    $routes = array_merge($routes, $fn());
  }

}


function processRoute($request) {
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