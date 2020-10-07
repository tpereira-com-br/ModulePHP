<?php
require_once("database/mysqli.php");
class ExcluirRifa extends use_bd
{
    private $rifa;
    public $status;

    function __construct($rifa) {
        parent::__construct();
        $this->rifa = $this->escapeString($rifa);
    }

    function execute(){     
        if ($result = $this->query("DELETE FROM Raffles WHERE RaffleID = $this->rifa")) {
            $this->status = "Rifa excluída com sucesso!";
            return true;
        } else {
            //print_r($this->error);
            $this->status = "Sistema fora do ar, tente mais tarde";
            return false;
        }
    }
}
?>