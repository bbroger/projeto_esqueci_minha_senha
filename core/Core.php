<?php

class Core
{

    public function start()
    {
        $url = '/';
        $parameters = [];

        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);

            // Controllers
            array_shift($url);
            $currentController = $url[0] . 'Controller';

            // Actions
            array_shift($url);
            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
            } else {
                $currentAction = 'index';
            }

            // Parameters
            array_shift($url);
            if (count($url) > 0) {
                $parameters = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        $controller = new $currentController();
        call_user_func_array(array($controller, $currentAction), $parameters);
    }
}
