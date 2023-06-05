<?php



function processRoute($request) {

     switch ($request) {
     case '':
     case '/':
         $content = welcome();
         include BASE_DIR . '/templates/diagnostic.tpl.php';
         $content = welcome();
         $content = call_user_func("welcome");
         $content = file_get_contents( BASE_DIR . '/routes/diagnostic.html');
         break;
     case '/diagnostic':
         $content = file_get_contents( BASE_DIR . '/routes/diagnostic.html');
         break;
     case '/send':
         require BASE_DIR . '/routes/submit.php';
         break;
     default: 
         $content = file_get_contents( BASE_DIR . '/routes/notfound.html');

         http_response_code(404);
         break;
     }

}