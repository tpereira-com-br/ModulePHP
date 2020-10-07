<?php
require_once("database/mysqli.php");
class InserirResultado extends use_bd
{
    private $rifa;
    private $numero;
    private $data;
    private $link;
    public $numbers;
    public $totalnumbers;
    public $status;

    function __construct($rifa,$numero,$data,$link){
        parent::__construct();
        $this->rifa = $this->escapeString($rifa);
        $this->numero = $this->escapeString($numero);
        $this->data = $this->escapeString($data);
        $this->link = $this->escapeString($link);
    }

    function RifaCompleta(){
        if ($result = $this->query("SELECT COUNT(Number) FROM Numbers INNER JOIN Tickets WHERE Numbers.TicketID = Tickets.TicketID AND Tickets.Status = 'Pago' AND Tickets.RaffleID = $this->rifa")) {
            if ($numbers = $result->fetch_array(MYSQLI_NUM)) {
                $this->numbers = $numbers[0];
                if ($result = $this->query("SELECT Numbers FROM Raffles WHERE RaffleID = $this->rifa")) {
                    if ($totalnumbers = $result->fetch_array(MYSQLI_NUM)) {
                        $this->totalnumbers = $totalnumbers[0];
                        if ($this->numbers >= $this->totalnumbers ) {
                            return true;
                        } else {
                            $this->status = "Essa rifa não vendeu todos os números!";
                            return false;
                        }      
                    }
                } else {
                    print_r($this->error);
                    $this->status = "Sistema fora do ar, tente mais tarde!";
                    return false;
                }
            }
        } else {
            //print_r($this->error);
            $this->status = "Sistema fora do ar, tente mais tarde!";
            return false;
        }
    }
    
    function execute(){
        if ($this->RifaCompleta()){
            if ($result = $this->query("SELECT 1 FROM Raffles WHERE RaffleID = $this->rifa AND Status = 'Aberta'")) {
                if ($result->fetch_array(MYSQLI_NUM)) {
                    if ($result = $this->query("UPDATE Raffles SET DrawNumber = $this->numero, DrawLink = '$this->link', DrawDate = '$this->data', Status = 'Concluída' WHERE RaffleID = $this->rifa AND Status = 'Aberta'")) {
                        $this->status = "Resultado inserido com sucesso!";
                        return true;
                    } else {
                        //print_r($this->error);
                        $this->status = "Sistema fora do ar, tente mais tarde!";
                        return false;
                    } 
                } else {
                    $this->status = "Essa rifa não existe ou já foi finalizada!";
                    return false;
                }
            } else {
                 //print_r($this->error);
                 $this->status = "Sistema fora do ar, tente mais tarde!";
                 return false;
            }
        } else {
            return false;
        }
        
        
    }
}
?>