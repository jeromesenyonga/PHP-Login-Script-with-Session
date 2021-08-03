<?php
namespace Jerome;

use \Jerome\DataSource;

class User
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }

    function getUserById($userId)
    {
        $query = "select * FROM registered_users WHERE id = ?";
        $paramType = "i";
        $paramArray = array($userId);
        $userResult = $this->ds->select($query, $paramType, $paramArray);
        
        return $userResult;
    }
    
    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "select * FROM registered_users WHERE user_name = ? AND password = ?";
        $paramType = "ss";
        $paramArray = array($username, $passwordHash);
        $userResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($userResult)) {
            $_SESSION["userId"] = $userResult[0]["id"];
            return true;
        }
    }
}