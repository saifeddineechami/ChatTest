<?php

namespace Core;

abstract class BaseController
{
    /**
     * @var array $errors
     */
    protected $errors = [];

    /**
     * @var EntityManager $em
     */
    protected $em;

    public function __construct()
    {
        $this->em = new EntityManager();
    }


    /**
     * run Controller
     *
     * @param $action
     */
    public function run($action)
    {
        $this->$action();
    }

    /**
     * @param $template
     * @param array    $vars
     */
    protected function renderView($template, array $vars = [])
    {
        extract($vars);
        extract($vars);
        try {
            $file = '../Src/Views/' . strtolower($template);

            if (file_exists($file)) {
                include $file;
            } else {
                throw new customException('Template ' . $template . ' not found!');
            }
        } catch (customException $e) {
            echo $e->errorMessage();
        }
    }

    protected function renderJson($response)
    {
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    /**
     * @param $url
     */
    protected function redirectUrl($url)
    {
        header("location:". __baseurl__.$url, true, 302);
        exit();
    }

    /**
     * @return bool
     */
    protected function isAjaxRequest()
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }
}
