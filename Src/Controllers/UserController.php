<?php

namespace Chat\Controllers;

use Chat\Models\Entities\User;
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

    public function loginAction()
    {
        $this->isUserLogged();
        $params = [];
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $data = ['username'=>$username,'password'=>$password];
            $params["data"] = $data;
            $user = new User($data);
            $entity = $this->em->getRepository("user")
                ->findOne(['username' => $user->getUsername()]);

            if ($entity) {
                if (password_verify($user->getPassword(), $entity->getPassword())) {
                    $_SESSION['loggedIn'] = $entity->getId();
                    $entity->setIsLogged(1);
                    $this->em->getRepository("user")
                        ->update($entity);
                } else {
                    $this->errors["login"][] = 'Merci de vérifier vos identifiants';
                }
            } else {
                $this->errors["login"][] = 'Merci de vérifier vos identifiants';
            }
            if (!count($this->errors)) {
                $this->redirectUrl('/');
            } else {
                $params['errors'] = $this->errors["login"];
            }
        }
        $this->RenderView('login.view.php', $params);
    }

    public function logoutAction()
    {
        $user = $this->em->getRepository("user")
            ->findOne(['id' => $_SESSION["loggedIn"]]);

        $user->setIsLogged(0);

        $this->em->getRepository("user")
            ->update($user);

        unset($_SESSION['loggedIn']);
        $this->redirectUrl('/user/login');
    }

    public function registerAction()
    {
        $this->isUserLogged();
        $params = [];
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
            $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
            $userName = isset($_POST['userName']) ? $_POST['userName'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

            $data = [   'firstName' => $firstName,
                'lastName' => $lastName,
                'userName' => $userName,
                'email' => $email,
                'password' => $password,
                'confirmPassword' => $confirmPassword,
                'isLogged' => 0
            ];

            $params["data"] = $data;
            $user = new User($data);
            if (!$user->getFirstName()
                || !$user->getLastName()
                || !$user->getUserName()
                || !$user->getEmail()
                || !$user->getPassword()
                || !$user->getConfirmPassword()
            ) {
                $this->errors["register"][] = 'Tous les champs sont obligatoires!';
            }

            if ($user->getConfirmPassword() !== $user->getPassword()) {
                $this->errors["register"][] = 'les deux mots de passe doivent etre indentiques!';
            }

            $entity = $this->em->getRepository("user")
                ->findOne(['userName' => $user->getUserName()]);

            if ($entity) {
                $this->errors["register"][] = 'le nom d\'utilisateur existe déja !';
            }

            if (!count($this->errors)) {
                if (!$entity) {
                    $user->cryptPassword();
                    $this->em->getRepository("user")
                        ->add($user);
                    $_SESSION['loggedIn'] = $user->getId();
                    $user->setIsLogged(1);
                    $this->em->getRepository("user")
                        ->update($user);
                }
                $this->redirectUrl('/');
            } else {
                $params['errors'] = $this->errors["register"];
            }
        }

        $this->RenderView('register.view.php', $params);
    }
}
