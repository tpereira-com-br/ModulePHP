<?php
require_once("database/mysqli.php");
class CriarRifa extends use_bd
{
    private $title;
    private $description;
    private $awards;
    private $number;
    private $price;
    private $banner;
    public $status;

    function __construct($title, $description, $awards, $number, $price, $banner) {
        parent::__construct();
        $this->title = $this->escapeString($title);
        $this->description = $this->escapeString($description);
        $this->awards = $this->escapeString($awards);
        $this->number = $this->escapeString($number);
        $this->price = $this->escapeString($price);
        $this->banner = $banner;
    }

    function execute(){
        ini_set( 'upload_max_size' , '3M' );
        ini_set( 'post_max_size', '3M');
        ini_set( 'max_execution_time', '300' );
        ini_set('memory_limit','1024M');

        if ($query = $this->query("SELECT Auto_Increment FROM information_schema.tables WHERE table_name='Raffles'")) {
            $result = $query->fetch_array(MYSQLI_NUM);
            $next_id = $result[0];
            $dir = "assets/img/rifa/image1-rifa$next_id.png";
            if(move_uploaded_file($this->banner['tmp_name'], "$dir")){
                if ($result = $this->query("INSERT INTO Raffles (RaffleID,Title,Description,Awards,Numbers,Valor,Status) VALUES ($next_id, '$this->title','$this->description','$this->awards',$this->number, '$this->price','Aberta')")) {
                    $this->status = "Rifa inserida com sucesso!";
                    return true;
                } else {
                    //print_r($this->error);
                    $this->status = "Sistema fora do ar, tente mais tarde";
                    return false;
                }
                
            } else {
                $this->status = "Erro no envio do comprovante!";
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