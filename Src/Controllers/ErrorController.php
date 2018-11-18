<?php

namespace Chat\Controllers;

use Core\BaseController;

class ErrorController extends BaseController
{
    public function notFoundAction()
    {
        $this->RenderView('notfound.view.php');
    }
}
