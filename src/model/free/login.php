<?php
require_once("../database/mysqli.php");
class Login extends use_bd
{
    private $userID;
    private $username;
    private $userPW;
    private $sessionID;
    private $userIP;
    public $status;

    function __construct($username, $userPW) {
        $access = new access;
        parent::__construct();
        $this->username = $this->escapeString($username);
        $this->userPW = $this->escapeString($userPW);
        $this->sessionID = session_id();  
        $this->userIP = $this->escapeString($access->get_userip());
    }

    function getUserID(){
        return $this->userID;
    }

    function check()
    {
        if ($result = $this->query("SELECT UserID, Pw FROM Users WHERE Username = '$this->username' LIMIT 1")) {
            if($result->num_rows){
                $result = $result->fetch_array(MYSQLI_NUM);
                $pw = $result[1];
                if (password_verify($this->userPW, $pw)) {
                    $this->userID = $result[0];
                    if ($saveSession = $this->query("INSERT INTO Sessions (UserID, PHPsession_id, UserIP) VALUES ($this->userID, '$this->sessionID', '$this->userIP')")) {
                        $_SESSION['userID'] = $this->userID;
                        $this->status = "Login efetuado com sucesso!";
                        return true;
                    } else {
                        $this->status = "Sistema fora do ar, tente mais tarde";
                        print_r($this->error);
                    }
                    
                } else {
                    $this->status = "Senha incorreta!";
                    return false;
                }
            } else {
                $this->status = "Usuario não existe";
                return false;
            }
        } else {
            $this->status = "Sistema fora do ar, tente mais tarde";
            //print_r($this->error);
        }
    }
}
?>