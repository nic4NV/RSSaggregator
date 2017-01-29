<?php

class UserController 
{
    
    
    public function actionRegister() 
    {
        $name = '';
        $email = '';
        $password = '';
        
        if (isset($_POST['submit'])) {  
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if (!User::checkName($name)) {   //validation
                $errors[] = 'The name should have at least two characters!';
            }
            
            if (!User::checkEmail($email)) {
                $errors[] = 'Uncorrect Email!';
            }
            
            if (!User::checkPassword($password)) {
                $errors[] = 'The password should have at least six characters!';
            }
            
            if (User::checkEmailExists($email)) {
                $errors[] = 'This Email is already in use';
            }

            if ($errors == false) {   //if no errors
                $result = User::register($name, $email, $password);   //do this
            }
        }
        require_once(ROOT . '/views/user/register.php');

        return true;
        }
        
        
        public function actionLogin()
    {
        $email = '';
        $password = '';
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            //validation
            if (!User::checkEmail($email)) {
                $errors[] = 'Uncorrect Email!';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'The password should have at least six characters!';
            }
            
            //check if user exists
            $userId = User::checkUserData($email, $password);
            
            if ($userId == false) {
                $errors[] = 'Uncorrect data';
            } else {
                User::auth($userId);
                //relocates to main page
                header('Location: /');
            }
        }
        
        require_once(ROOT . '/views/user/login.php');
        
        return true;
    }
    
        public function actionLogout()
        {
            unset($_SESSION['user']);
            header('Location: /');
        }
}
