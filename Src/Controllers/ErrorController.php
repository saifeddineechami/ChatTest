<?php

namespace Chat\Controllers;

use Core\BaseController;

class ErrorController extends BaseController
{
    function notFoundAction()
    {
        $this->RenderView('notfound.view.php');
    }
}


