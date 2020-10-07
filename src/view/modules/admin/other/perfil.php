<?php
require_once("../database/mysqli.php");
class Perfil extends use_bd{
    public $array =[];

    function __construct() {
        parent::__construct();
        $this->access = new access;
    }

    function load(){
        $userid = $this->escapeString($this->access->get_userid());
        $sessionid = $this->escapeString($this->access->get_sessionid());
        $userip = $this->escapeString($this->access->get_userip());
        if ($result = $this->query("SELECT Nome FROM Users INNER JOIN Sessions ON Users.UserID = Sessions.UserID Where Sessions.UserID = '$userid' and Sessions.PHPsession_id = '$sessionid' and Sessions.UserIP = '$userip' LIMIT 1")) {
            if ($user = $result->fetch_array(MYSQLI_ASSOC)) {
                foreach ($user as $key => $value) {
                    $this->array[$key] = $value;
                }
                return true;
            }
        } else {
            //print_r($this->error);
            die("Sistema fora do ar, tente novamente mais tarde!");
            return false;
        }
    }

    function html(){
        print_r($this->info);
        $html = '<h1>Perfil</h1><br>';
        $html .= '<div class="col-1">';
        $html .= '<div class="col-1">';
        $html .= '<table style="width:100%">';
        $html .= '<tr><th>Nome:</th><td> '.$this->array["Nome"].'</td></tr>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';

        if(count($this->array) == 0){
            $html = "Erro ao carregar dados! Atualize a página.</h3>";
        }
        
        return $html;
    }
}
?>