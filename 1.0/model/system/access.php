<?php
require_once("../database/query_database.php");
class Access extends QueryDatabase{
    private $userid;
    private $sessionid;
    private $userip;
    public $userlevel;
    
    function __construct() {
        parent::__construct();
        if ($_SESSION["userID"]) {
            $this->userid = $this->escape_string($_SESSION["userID"]);
            $this->sessionid = $this->escape_string(session_id());
            $this->userip = $this->escape_string($this->capture_userip());
        }
    }
    
    function set_userlevel($userlevel) {
        $this->userlevel = $userlevel;
    }

    function get_userid() {
        return $this->userid;    
    }

    function get_sessionid() {
        return $this->sessionid;    
    }

    function get_userip() {
        return $this->userip;    
    }

    function get_userlevel() {
        return $this->userlevel;
    }

    function auth(){
        if ($this->userid && $this->sessionid && $this->userip) {
            if (!$this->connect_error) {
                if ($query = $this->query("SELECT AccessLevel FROM Users INNER JOIN Sessions ON Users.UserID = Sessions.UserID Where Sessions.UserID = '$this->userid' and Sessions.PHPsession_id = '$this->sessionid' and Sessions.UserIP = '$this->userip' LIMIT 1")) {
                    if($query->num_rows == 1){
                        $result = $query->fetch_array(MYSQLI_NUM);
                        $this->set_userlevel($result[0]);
                        return true;
                    } else {
                        $this->set_userlevel("free");
                        return false;
                    }
                } else {
                    $this->set_userlevel("free");
                    return false;
                }
            } else {
                $this->set_userlevel("free");
                return false;
            }
        } else {
            $this->set_userlevel("free");
            return false;
        }
    }

    function capture_userip() {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
            foreach ($matches[0] AS $xip) {
                if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                    $ip = $xip;
                    break;
                }
            }
        } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_IP'])) {
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        }
        return $ip;
    }

    
}
?>