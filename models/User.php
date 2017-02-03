<?php

class User {

    public static function register($name, $email, $password) {   //
        $db=Db::getConnection();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hash, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function checkUserData($email, $password) // get id by email and password
    {
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM user WHERE email = :email';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();
        
        $user = $result->fetch();
        if ($user AND password_verify($password, $user['password'])) {
            return $user['id'];
        }
        
        return false;
    }
    
    public static function auth($userId)
    {
        
        $_SESSION['user'] = $userId;
    }
    
    public static function checkLogged()
    {
        
        //if session exist, get user id 
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        
    //    header('Location: /user/login');
    }

    public static function isGuest()
    {
        
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

        public static function checkName($name) {   //name validation
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    
   

    public static function checkPassword($password) {  //password validation
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email) {   // email validation
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email) {   // just read the function name
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
    
    public static function getUserById($id)   //get user information array from db by id
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';
            
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            
            return $result->fetch();
        }
    }

}
