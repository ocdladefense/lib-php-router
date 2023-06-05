<?php 




class TemplateRouter extends Router {
    /**
     * Given the location of template files, this router assumes
     *  a valid route if the request URI matches the name of a template file.
     */


    function processRoute($request) {
        global $routes;
        ob_start();
        $requestString = substr($request, 1);
        $callback = function() { return "Load the template file here..."; };
        $output = $callback();

        $out = ob_get_contents();
        ob_end_clean();
        return $out;

    }

}