<?php
/**
 * Created by PhpStorm.
 * User: saif
 * Date: 06/11/18
 * Time: 23:21
 */

namespace Chat\Controllers;

use Core\BaseController;

class DefaultController extends BaseController
{
    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        //if the user is not logged in and requested a protected resource redirect to login//
        if (!isset($_SESSION['loggedIn'])) {
            $this->redirectUrl('user/login');
        }

    }

    public function indexAction()
    {
        $params = [];
        $params['connectedUsers'] = UserHandler::getConnectedUsers();
        if ($this->isAjaxRequest())
        {
            $messageHandler = new MessageHandler();

            if ('POST' === $_SERVER['REQUEST_METHOD']) {
                $message = isset($_POST['message']) ? $_POST['message'] : '';
                $message = new Message(['message' => $message, 'senderId' => $_SESSION['loggedIn']]);

                $added = $messageHandler->add($message);

                if ($added) {
                    $response = ['success' => true];
                } else {
                    $response = ['success' => false, 'errors' => $messageHandler->getAddMessageErrors()];
                }

            } else {

                $messages = $messageHandler->getMessages();
                if (!empty($messages)) {
                    $response = ['success' => true, 'messages' => $messages];
                } else {
                    $response = ['success' => false];
                }
            }

            $this->renderJson($response);

        } else {
            $this->renderView('chat.view.php', $params);
        }


    }
}

