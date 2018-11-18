<?php

namespace Chat\Controllers;

use Core\BaseController;
use Chat\Models\Entities\Message;

class DefaultController extends BaseController
{
    /**
     * DefaultController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        //if the user is not logged in and requested a protected resource redirect to login//
        if (!isset($_SESSION['loggedIn'])) {
            $this->redirectUrl('/user/login');
        }
    }

    public function indexAction()
    {
        if ($this->isAjaxRequest()) {
            if ('POST' === $_SERVER['REQUEST_METHOD']) {
                $message = isset($_POST['message']) ? $_POST['message'] : '';
                $message = new Message(
                    [
                        'message' => $message,
                        'senderId' => $_SESSION['loggedIn']
                    ]
                );

                if (empty($message->getMessage())) {
                    $this->errors["chat"][] = 'Votre message est vide !';
                    $response = ['success' => false, 'errors' => $this->errors["chat"]];
                } else {
                    $this->em->getRepository("message")
                        ->add($message);
                    $response = ['success' => true];
                }
            } else {
                $messages = $this->em
                    ->getRepository("message")
                    ->findAll([], ['createdAt'=>'desc'], 'array');
                $usres = $this->em
                    ->getRepository("user")
                    ->findAll(["isLogged" => 1], [], 'array');
                if (!empty($messages)) {
                    $response = ['success' => true, 'messages' => $messages,'usres' => $usres];
                } else {
                    $response = ['success' => false];
                }
            }

            $this->renderJson($response);
        } else {
            $this->em->getRepository("user")
                ->findAll(array('isLogged'=>true));
            $this->renderView('chat.view.php');
        }
    }
}
