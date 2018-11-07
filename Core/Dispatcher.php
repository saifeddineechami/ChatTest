<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 06/11/18
 * Time: 21:31
 */

namespace Core;


class Dispatcher
{
    /**
     * @var string Current controller name
     */
    private $controller;

    /**
     * @var string Current action name
     */
    private $action;

    /**
     * @var Dispatcher
     */
    public static $instance = null;

    /**
     * Dispatcher constructor.
     */
    protected function __construct()
    {
        $uri = str_replace(__baseurl__,"",$_SERVER['REQUEST_URI']);
        $array = explode('/', $uri);
        if(count($array) >=2)
        list($this->controller, $this->action) = $array;

    }

    /**
     * Get current instance of dispatcher (singleton).
     *
     * @return Dispatcher
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Dispatcher();
        }
        return self::$instance;
    }

    /**
     *
     */
    public function Dispatch()
    {
        $this->controller = ($this->controller)?:'default';
        $this->action = ($this->action)?:'index';
        $controller = "Chat\Controllers\\".ucfirst($this->controller)."Controller";
        $action = "{$this->action}Action";

        //validate requested controller and action //
        if (class_exists($controller)) {
            $controller = new $controller();

            if (method_exists($controller, $action)) {
                // Running controller
                $controller->run($action);
                exit();
            }

        }
        // if the controller doesn't exist then we redirect to not found action //
        $this->controller = 'error';
        $this->action = 'notFound';
        $this->Dispatch();
    }

}