<?php
require_once("../database/mysqli.php");
require_once("access.php");
class Auth extends use_bd{
    private $access;

    function __construct(){
        parent::__construct();
        $this->access = new access;
    }

    function check(){
        if (!$this->connect_error) {
            $userid = $this->escape_string($this->access->get_userid());
            $sessionid = $this->escape_string($this->access->get_sessionid());
            $userip = $this->escape_string($this->access->get_userip());
            if ($result = $this->query("SELECT AccessLevel FROM Users INNER JOIN Sessions ON Users.UserID = Sessions.UserID Where Sessions.UserID = '$userid' and Sessions.PHPsession_id = '$sessionid' and Sessions.UserIP = '$userip' LIMIT 1")) {
                if($result->num_rows == 1){
                    $result = $result->fetch_array(MYSQLI_NUM);
                    $AccessLevel = $result[0];
                    $this->access->set_userlevel($AccessLevel);
                    return true;
                } else {
                    $this->access->set_userlevel("free");
                    $this->deny();
                    return false;
                }
            } else {
                $this->access->set_userlevel("free");
                $this->deny();
                return false;
            }
        } else {
            $this->access->set_userlevel("free");
            $this->deny();
            return false;
        }
    }

    function deny(){
        return true;
    }

    function set_access($access){
        $this->access = $access;
    }

    function get_access(){
        return $this->access;
    }

}