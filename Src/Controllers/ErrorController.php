<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 06/11/18
 * Time: 23:45
 */

namespace Chat\Controllers;

use Core\BaseController;

class ErrorController extends BaseController
{
    function notFoundAction()
    {
        $this->RenderView('notfound.view.php');
    }
}


