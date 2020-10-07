<?
class QueryDatabase extends mysqli{
    public $status;
    function __construct() {
        require_once("../config.php");
        if(db_host && db_user && db_pw && db_name){
            parent::__construct(db_host, db_user, db_pw, db_name);
            if ($this->connect_error) {
                $this->$status = [0, "Erro de conexão com o banco de dados, contate o suporte."];
            } else {
                $this->set_charset("utf8");
            }
        } else {
            $this->status = [0, "Banco de dados não definido"];
        }
    }
}