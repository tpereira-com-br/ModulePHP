<?php
require_once("database/mysqli.php");
class ConfirmarPagamento extends use_bd
{
    private $ticket;
    private $ticketstatus;
    public $status;

    function __construct($ticket, $ticketstatus) {
        parent::__construct();
        $this->ticket = $this->escapeString($ticket);
        $this->ticketstatus = $this->escapeString($ticketstatus);
    }

    function execute(){
        if ($result = $this->query("SELECT 1 FROM Tickets WHERE TicketID = $this->ticket AND Status = 'Aguardando confirmação de pagamento'")){
            if($result->num_rows){
                if ($this->ticketstatus) {
                    if ($result = $this->query("UPDATE Tickets SET Status = 'Pago, aguardando sorteio' WHERE TicketID = $this->ticket AND Status = 'Aguardando confirmação de pagamento'")) {
                        $this->status = "Comprovante confirmado com sucesso!";
                        return true;
                    } else {
                        //print_r($this->error);
                        $this->status = "Sistema fora do ar, tente mais tarde";
                        return false;
                    }
                } else {
                    if ($result = $this->query("UPDATE Tickets SET Status = 'Comprovante rejeitado, repita a compra e envie um comprovante válido' WHERE TicketID = $this->ticket AND Status = 'Aguardando confirmação de pagamento'")) {
                        $this->status = "Comprovante rejeitado com sucesso!";
                        return true;
                    } else {
                        print_r($this->error);
                        $this->status = "Sistema fora do ar, tente mais tarde";
                        return false;
                    }
                }
            } else {
                //print_r($this->error);
                $this->status = "Esse comprovante já foi avaliado!";
                return false;
            }
        } else {
            //print_r($this->error);
            $this->status = "Sistema fora do ar, tente mais tarde";
            return false;
        }
        
        
    }
}
?>