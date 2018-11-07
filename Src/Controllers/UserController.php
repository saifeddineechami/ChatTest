<?php

namespace Chat\Controllers;

use Chat\Entities\User;
use Core\BaseController;

class UserController extends BaseController
{


    public function isUserLogged()
    {
        // if the user is logged in then redirect to home page //
        if (isset($_SESSION['loggedIn'])) {
            $this->redirectUrl('/');
        }

    }
    function loginAction()
    {
        $this->isUserLogged();
        $params = [];
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
            $user = new User(['username'=>$username,'password'=>$password]);
            $userHandler = new UserHandler();
            $loggedIn = $userHandler->login($user);

            if ($loggedIn) {
                $this->redirectUrl('/');
            } else {
                $params['errors'] = $userHandler->getLoginErrors();
            }
        }
        $this->RenderView('login.view.php', $params);
    }

    function logoutAction()
    {

        $userHandler = new UserHandler();
        $userHandler->logout();
        $this->redirectUrl('/user/login');

    }

    function registerAction()
    {
        $this->isUserLogged();
        $params = [];
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['pwd']) ? $_POST['pwd'] : '';
            $confirmPassword = isset($_POST['confirm_pwd']) ? $_POST['confirm_pwd'] : '';
            $user = new User(['username'=>$username,'password'=>$password,'confirmPassword'=>$confirmPassword]);
            if (!$user->getUsername()
                || !$user->getPassword()
                || !$user->getConfirmPassword()) {
                $this->errors["register"] = 'Tous les champs sont obligatoires!';
            }

            if ($user->getConfirmPassword() !== $user->getPassword()) {
                $this->errors["register"] = 'les deux mots de passe doivent etre indentiques!';
            }

            /**@var User $entity */
            $entity = $this->entityRepository->findOne(['username' => $user->getUsername()]);

            if (!$entity) {
                $user->cryptPassword();
                $this->entityRepository->add($user);
                $_SESSION['loggedIn'] = $user->getId();
                $this->addConnectedUser($user);
                return true;
            }

            if ($user->getUsername() === $entity->getUsername()) {
                $this->errors["register"] = 'le nom d\'utilisateur existe déja !';
            }

            if (!count($this->errors["register"])) {
                $this->redirectUrl('/');
            } else {
                $params['errors'] = $this->errors["register"];
            }

        }
        $this->RenderView('register.view.php', $params);
    }

}

?>
