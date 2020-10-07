<?
class File{
    public $path;
    public $lite = false;
    public $content;
    public $type;

    function __construct(){
        $this->path = explode("?", substr($_SERVER["REQUEST_URI"], 1))[0];
    }

    function typeconfig($userlevel){
        $path_array = explode("/", $this->path);
        switch ($path_array[0]) {
            case 'controller':
                $this->type =  "controller";
                $this->path .=  ".php";
                break;
            
            case 'assets':
                $this->type =  "assets";
                $this->path =  "view/$this->path";
                break;
            
            default:
                $this->type =  "page";
                if ($this->path) {
                    $this->path =  "view/pages/$userlevel/$this->path.php";
                } else {
                    $this->path =  "view/pages/$userlevel/index.php";
                }
                break;
        }
    }
    
    function lite(){
        $path_array = explode("/", $this->path);
        if (array_reverse($path_array)[0] == "lite") {
            array_pop($path_array);
            $this->lite = true;
        } else {
            $this->lite = false;
        }
        $this->path = implode("/", $path_array);
    }

    function liteaction(){
        
    }

    function exist($userlevel){
        $this->typeconfig($userlevel);
        if (!@$result = include($this->path)){
            if ($this->type == "page") {
                $this->path = "view/pages/$userlevel/404.php";
                if (!@$result = include($this->path)){
                    $this->path = "view/pages/404.php";
                    if (!@$result = include($this->path)){
                        die("Página Inexistente!");
                    }
                }
            } else {
                die("Arquivo inexistente!");
            }
            
        }
        if ($this->path == "controller/browse.php") {
            header("Location: /");
        }
    }

    function open($userlevel){
        $this->exist($userlevel);
        require_once($this->path);
    }
}
?>